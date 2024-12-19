/*
  Warnings:

  - Added the required column `expired_at` to the `order` table without a default value. This is not possible if the table is not empty.
  - Added the required column `payment_url` to the `order` table without a default value. This is not possible if the table is not empty.

*/
-- AlterTable
ALTER TABLE `order` ADD COLUMN `expired_at` DATETIME(3) NOT NULL,
    ADD COLUMN `payment_url` VARCHAR(255) NOT NULL;
