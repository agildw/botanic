/*
  Warnings:

  - Added the required column `order_code` to the `order` table without a default value. This is not possible if the table is not empty.

*/
-- DropForeignKey
ALTER TABLE `order_detail` DROP FOREIGN KEY `order_detail_order_id_fkey`;

-- DropForeignKey
ALTER TABLE `order_detail` DROP FOREIGN KEY `order_detail_product_id_fkey`;

-- AlterTable
ALTER TABLE `order` ADD COLUMN `order_code` VARCHAR(255) NOT NULL;

-- AddForeignKey
ALTER TABLE `order_detail` ADD CONSTRAINT `order_detail_order_id_fkey` FOREIGN KEY (`order_id`) REFERENCES `order`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- AddForeignKey
ALTER TABLE `order_detail` ADD CONSTRAINT `order_detail_product_id_fkey` FOREIGN KEY (`product_id`) REFERENCES `product`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
