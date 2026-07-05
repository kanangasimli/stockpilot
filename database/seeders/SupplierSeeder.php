<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $suppliers = [
            [
                'name' => 'Tech Supply Ltd',
                'email' => 'info@techsupply.com',
                'phone' => '+994501112233',
                'address' => 'Baku',
            ],
            [
                'name' => 'Office World',
                'email' => 'sales@officeworld.com',
                'phone' => '+994502223344',
                'address' => 'Sumqayit',
            ],
            [
                'name' => 'Global Electronics',
                'email' => 'contact@globalelectronics.com',
                'phone' => '+994503334455',
                'address' => 'Ganja',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::updateOrCreate(
                ['email' => $supplier['email']],
                $supplier
            );
        }
    }
}