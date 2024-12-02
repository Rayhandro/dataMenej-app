<?php

namespace Database\Seeders;

use App\Models\CostCenter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CostCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CostCenter::create([
            'cc_code' => '13MV000000',
            'name' => 'Group Marketing Java',
        ]);

        CostCenter::create([
            'cc_code' => '13MV010000',
            'name' => 'Div. GTM & Marcomm 3ID',
        ]);

        CostCenter::create([
            'cc_code' => '13MV020000',
            'name' => 'Div. GTM & Marcomm IM3',
        ]);

        CostCenter::create([
            'cc_code' => '13MV030000',
            'name' => 'Div. Product, Pricing & CVM IM3 Java',
        ]);

        CostCenter::create([
            'cc_code' => '13MV040000',
            'name' => 'Div. Product, Pricing, & CVM 3ID Java',
        ]);
    }
}
