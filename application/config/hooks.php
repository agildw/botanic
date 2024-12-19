<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/userguide3/general/hooks.html
|
*/

# Load phpdotenv
$hook['pre_system'] = function() {
    // $dotenv = Dotenv\Dotenv::createImmutable(FCPATH);
    // $dotenv->load();
    try {
        $dotenv = Dotenv\Dotenv::createImmutable(FCPATH);
        $dotenv->safeLoad();
        $dotenv->required(['DB_HOSTNAME', 'DB_USERNAME', 'DB_PASSWORD', 'DB_DATABASE', 'XENDIT_API_KEY','XENDIT_WEBHOOK_TOKEN']);
    } catch (Exception $e) {
        echo 'Error loading .env file: ',  $e->getMessage();
    }
};