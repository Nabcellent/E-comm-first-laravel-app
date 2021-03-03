<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products') -> insert([
            [
                "title" => 'Samsung mobile',
                "price" => "21000",
                "description" => "Smart phone with 4GB RAM and 128GB ROM",
                "category" => "mobile",
                "image" => "https://images-na.ssl-images-amazon.com/images/I/71bp9IpcK-L._SX522_.jpg"
            ],[
                "title" => 'Hisense TV',
                "price" => "30000",
                "description" => "Smart TV 50\'",
                "category" => "television",
                "image" => "https://ke.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/00/381533/2.jpg?5845"
            ],[
                "title" => 'OPPO mobile',
                "price" => "40000",
                "description" => "Smart phone with 6GB RAM and 256GB ROM",
                "category" => "mobile",
                "image" => "https://n4.sdlcdn.com/imgs/i/f/2/Oppo-F11-Pro-CPH1969-128GB-SDL257164210-1-b1082.jpg"
            ],
            [
                "title" => 'Tecno mobile',
                "price" => "7000",
                "description" => "Smart phone with 4GB RAM and 128GB ROM",
                "category" => "mobile",
                "image" => "https://images-na.ssl-images-amazon.com/images/I/71wPwmxo2NL._SL1500_.jpg"
            ],
            [
                "title" => 'Samsung TV',
                "price" => "70000",
                "description" => "A 70\" Smart Television",
                "category" => "television",
                "image" => "https://le.co.ke/wp-content/uploads/2019/08/MCTV-24-INCH-600x600.jpg"
            ],
            [
                "title" => 'Fridge',
                "price" => "70000",
                "description" => "A Smart Fridge with much more features",
                "category" => "fridge",
                "image" => "https://le.co.ke/wp-content/uploads/2020/08/Ramtons-93-Liters-Single-Door-Fridge-1.jpg"
            ]
        ]);
    }
}
