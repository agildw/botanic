<?php 
 
class Auth_model extends CI_Model{
	private $_table = 'user';

    public function login_rules()
	{
		return [
			[
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|max_length[255]'
			]
		];
	}

    public function register_rules()
    {
        return [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[user.email]'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|max_length[255]'
            ],
            [
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'state',
                'label' => 'State',
                'rules' => 'required'
            ],
            [
                'field' => 'city',
                'label' => 'City',
                'rules' => 'required'
            ],
            [
                'field' => 'zip',
                'label' => 'Zip',
                'rules' => 'required'
            ],
            [
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required'
            ]
        ];
    }

    public function login($email, $password){
        // get user by email
        $user = $this->db->get_where($this->_table, ['email' => $email])->row_array();

        if(!$user){
            return false;
        }

        if(!password_verify($password, $user['password'])){
            return false;
        }

        $session_data = [
            'id' => $user['id'],
            'email' => $user['email'],
            'name' => $user['name'],
            'role' => $user['role']
        ];

        $this->session->set_userdata($session_data);

        return $user;
    }

    public function logout(){
        // $this->session->sess_destroy();
        $this->session->unset_userdata(['id', 'email', 'name', 'role']);
    }

    public function register($data){
        // check if email already registered
        $user = $this->db->get_where($this->_table, ['email' => $data['email']])->row_array();
        if($user){
            return false;
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->db->insert($this->_table, $data);
    }
}
