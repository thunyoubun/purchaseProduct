<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Product;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [

            [
                'title' => 'ชีวิตไม่ต้องเด่น ขอแค่เป็นเทพในเงา',
            ],
            [
                'title' => 'คุณแม่ที่มีสกิลพื้นฐานเป็นการโจมตีหมู่แถมยังเบิ้ลได้แบบนี้ชอบไหมจ๊ะ',
            ],
            [
                'title' => 'คุณอาเรียโต๊ะข้างๆ พูดรัสเซียหวานใส่ซะหัวใจจะวาย',
            ],
            [
                'title' => 'ขอต้อนรับสู่ห้องเรียนนิยม (เฉพาะ) ยอดคน',
            ]

        ];
        foreach ($category as $key => $value) {
            Category::create($value);
        }
    }
}