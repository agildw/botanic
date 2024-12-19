-- AlterTable
ALTER TABLE `order` ADD COLUMN `paid_at` DATETIME(3) NULL,
    ADD COLUMN `payment_method` VARCHAR(255) NULL;
