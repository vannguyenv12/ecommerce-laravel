<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorShopProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'vendor@gmail.com')->first();

        $vender = new Vendor();
        $vender->banner = 'uploads/1234.jpg';
        $vender->shop_name = 'Vendor Shop';
        $vender->phone = '123123';
        $vender->email = 'vendor@gmail.com';
        $vender->address = 'USA';
        $vender->description = 'shop description';
        $vender->user_id = $user->id;
        $vender->save();
    }
}
