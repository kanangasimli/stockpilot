<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::pluck('id', 'name');
        $suppliers = Supplier::pluck('id', 'name');

        $products = [
            ['Laptop Dell Latitude 5420', 'LAP-DELL-5420', 'Electronics', 'Tech Supply Ltd', 850, 1050, 12, 5],
            ['HP LaserJet Printer', 'PRN-HP-LJ-001', 'Office Supplies', 'Office World', 220, 310, 4, 5],
            ['Logitech Wireless Mouse', 'ACC-LOG-MOUSE', 'Accessories', 'Global Electronics', 15, 25, 35, 10],
            ['Mechanical Keyboard', 'ACC-MECH-KEY', 'Accessories', 'Global Electronics', 45, 70, 8, 5],
            ['Office Chair', 'FUR-OFF-CHAIR', 'Furniture', 'Office World', 90, 140, 6, 3],
            ['Standing Desk', 'FUR-STAND-DESK', 'Furniture', 'Office World', 180, 260, 2, 3],
            ['TP-Link Router', 'NET-TPL-ROUTER', 'Networking', 'Tech Supply Ltd', 35, 55, 15, 5],
            ['Network Switch 8-Port', 'NET-SW-8PORT', 'Networking', 'Tech Supply Ltd', 40, 65, 7, 4],
            ['External HDD 1TB', 'STR-HDD-1TB', 'Storage', 'Global Electronics', 50, 75, 9, 5],
            ['USB Flash Drive 64GB', 'STR-USB-64GB', 'Storage', 'Global Electronics', 7, 12, 40, 15],
            ['Monitor 24 inch', 'ELC-MON-24', 'Electronics', 'Tech Supply Ltd', 120, 175, 5, 5],
            ['HDMI Cable', 'ACC-HDMI-2M', 'Accessories', 'Office World', 4, 8, 50, 20],
        ];

        foreach ($products as $item) {
            Product::updateOrCreate(
                ['sku' => $item[1]],
                [
                    'name' => $item[0],
                    'category_id' => $categories[$item[2]],
                    'supplier_id' => $suppliers[$item[3]],
                    'description' => $item[0] . ' demo product',
                    'purchase_price' => $item[4],
                    'selling_price' => $item[5],
                    'quantity' => $item[6],
                    'minimum_quantity' => $item[7],
                ]
            );
        }
    }
}