<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [

            [
                'name' => 'ชีวิตไม่ต้องเด่น ขอแค่เป็นเทพในเงา เล่ม1',
                'title' => 'ชีวิตไม่ต้องเด่น ขอแค่เป็นเทพในเงา',
                'category' => 'lightNovel',
                'description' => 'ชีวิตไม่ต้องเด่น ขอแค่เป็นเทพในเงา เล่ม1',
                'image' => 'assets/lnNew/kage.jpg',
                'stock' => 999,
                'price' => 500
            ],
            [
                'name' => '(LN) คุณแม่ที่มีสกิลพื้นฐานเป็นการโจมตีหมู่แถมยังเบิ้ลได้แบบนี้ชอบไหมจ๊ะ เล่ม 2',
                'title' => 'คุณแม่ที่มีสกิลพื้นฐานเป็นการโจมตีหมู่แถมยังเบิ้ลได้แบบนี้ชอบไหมจ๊ะ',
                'category' => 'lightNovel',
                'description' => '(LN) คุณแม่ที่มีสกิลพื้นฐานเป็นการโจมตีหมู่แถมยังเบิ้ลได้แบบนี้ชอบไหมจ๊ะ เล่ม 2',
                'image' => 'assets/lnNew/tsujo_2_cover.jpg',
                'stock' => 999,
                'price' => 228
            ],
            [
                'name' => '(LN) Special Set คุณอาเรียโต๊ะข้างๆ พูดรัสเซียหวานใส่ซะหัวใจจะวาย เล่ม 3',
                'title' => 'คุณอาเรียโต๊ะข้างๆ พูดรัสเซียหวานใส่ซะหัวใจจะวาย',
                'description' => '(LN) Special Set คุณอาเรียโต๊ะข้างๆ พูดรัสเซียหวานใส่ซะหัวใจจะวาย เล่ม 3',
                'image' => 'assets/lnNew/russia.jpg',
                'stock' => 999,
                'price' => 895
            ],
            [
                'name' => '(LN) ขอต้อนรับสู่ห้องเรียนนิยม (เฉพาะ) ยอดคน เล่ม 1',
                'title' => 'ขอต้อนรับสู่ห้องเรียนนิยม (เฉพาะ) ยอดคน',
                'description' => '(LN) ขอต้อนรับสู่ห้องเรียนนิยม (เฉพาะ) ยอดคน เล่ม 1',
                'image' => 'assets/lnNew/yokoso.jpg',
                'stock' => 999,
                'price' => 256
            ]

        ];
        foreach ($products as $key => $value) {
            Product::create($value);
        }
    }
}