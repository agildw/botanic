-- AlterTable
ALTER TABLE `order` MODIFY `status` ENUM('UNPAID', 'PAID', 'SHIPPED', 'CANCELLED') NOT NULL DEFAULT 'UNPAID';