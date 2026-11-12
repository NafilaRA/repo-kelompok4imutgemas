<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'code' => 'RLV-001',
            'name' => 'Sweater Korea',
            'category_id' => 6, // ID 6 (Sweater)
            'size_id' => 3,     // ID 3 (L)
            'condition' => '9.8/10',
            'description' => 'Bahan tebal, warna aman, kondisi 95% mulus seperti baru.',
            'price' => 75000,
            'original_price' => 90000,
            'stock' => 5,
            'image' => 'images/products/RLV-001.jpeg',
            'badge' => 'Like New',
            'status' => 'available'
        ]);

        Product::create([
            'code' => 'RLV-002',
            'name' => 'Vintage Graphic Tee White',
            'category_id' => 1, // ID 1 (Kaos)
            'size_id' => 2, // ID 2 (M)
            'condition' => '9.5/10',
            'description' => 'Kaos vintage warna putih bersih, bahan cotton combed adem.',
            'price' => 45000,
            'original_price' => 55000,
            'stock' => 9,
            'image' => 'images/products/RLV-002.jpeg',
            'badge' => 'Like New',
            'status' => 'available'
        ]);

        Product::create([
            'code' => 'RLV-003',
            'name' => 'Oversized Band Tee Black',
            'category_id' => 1,     // ID 1 (Kaos)
            'size_id' => 4, // ID 4 (XL)
            'condition' => '9.0/10',
            'description' => 'Kaos band rock era 90an, sablon retak estetik, bahan tebal.',
            'price' => 60000,
            'original_price' => 75000,
            'stock' => 2,
            'image' => 'images/products/RLV-003.jpeg',
            'badge' => 'Rare Find',
            'status' => 'available'
        ]);

        Product::create([
            'code' => 'RLV-004',
            'name' => 'Striped Cotton T-Shirt',
            'category_id' => 1,
            'size_id' => 2, // M
            'condition' => '9.2/10',
            'description' => 'Kaos motif garis-garis ala Korean style, kondisi mulus.',
            'price' => 40000,
            'original_price' => 50000,
            'stock' => 5,
            'image' => 'images/products/RLV-004.jpeg',
            'badge' => 'Like New',
            'status' => 'available'
        ]);

        // --- KEMEJA (Category ID: 2) ---
        Product::create([
            'code' => 'RLV-005',
            'name' => 'Flannel Checked Shirt',
            'category_id' => 2, // Kemeja
            'size_id' => 3, // L
            'condition' => '9.0/10',
            'description' => 'Kemeja flanel kotak-kotak hangat, kancing lengkap.',
            'price' => 65000,
            'original_price' => 80000,
            'stock' => 8,
            'image' => 'images/products/RLV-005.jpeg',
            'badge' => 'Like New',
            'status' => 'available'
        ]);

        Product::create([
            'code' => 'RLV-006',
            'name' => 'Casual Linen Shirt Olive',
            'category_id' => 2, // ID 2 (Kemeja)
            'size_id' => 5, // ID 5 (XXL)
            'condition' => '9.0/10',
            'description' => 'Kemeja bahan linen ringan warna hijau olive, cocok untuk OOTD santai.',
            'price' => 70000,
            'original_price' => 85000,
            'stock' => 4,
            'image' => 'images/products/RLV-006.jpeg',
            'badge' => 'Like New',
            'status' => 'available'
        ]);

        Product::create([
            'code' => 'RLV-007',
            'name' => 'Vintage Corduroy Shirt Brown',
            'category_id' => 2, // ID 2 (Kemeja)
            'size_id' => 4, // ID 4 (XL)
            'condition' => '9.0/10',
            'description' => 'Kemeja bahan korduroi tebal warna cokelat klasik.',
            'price' => 80000,
            'original_price' => 95000,
            'stock' => 4,
            'image' => 'images/products/RLV-007.jpeg',
            'badge' => 'Rare Find',
            'status' => 'available'
        ]);

        // --- CARDIGAN (Category ID: 3) ---
        Product::create([
            'code' => 'RLV-008',
            'name' => 'Knit Crop Cardigan Cream',
            'category_id' => 3, // ID 3 (Cardigan)
            'size_id' => 1, // ID 1 (S)
            'condition' => '9.0/10',
            'description' => 'Cardigan rajut model crop warna cream lembut.',
            'price' => 55000,
            'original_price' => 65000,
            'stock' => 4,
            'image' => 'images/products/RLV-008.jpeg',
            'badge' => 'Like New',
            'status' => 'available'
        ]);

        Product::create([
            'code' => 'RLV-009',
            'name' => 'Pastel V-Neck Knit Cardigan',
            'category_id' => 3,
            'size_id' => 3, // L
            'condition' => '9.0/10',
            'description' => 'Cardigan rajut kerah V warna pastel cerah, tidak gatal di kulit.',
            'price' => 65000,
            'original_price' => 75000,
            'stock' => 2,
            'image' => 'images/products/RLV-009.jpeg',
            'badge' => 'Like New',
            'status' => 'available'
        ]);

        Product::create([
            'code' => 'RLV-0010',
            'name' => 'Buttoned Chunky Cardigan Lilac',
            'category_id' => 3,
            'size_id' => 2, // M
            'condition' => '9.0/10',
            'description' => 'Chunky cardigan rajutan tebal warna ungu lilac yang kekinian.',
            'price' => 75000,
            'original_price' => 85000,
            'stock' => 3,
            'image' => 'images/products/RLV-0010.jpeg',
            'badge' => 'Like New',
            'status' => 'available'
        ]);

        // --- TANKTOP (Category ID: 4) ---
        Product::create([
            'code' => 'RLV-011',
            'name' => 'Ribbed Basic Tank Top Black',
            'category_id' => 4,
            'size_id' => 1, // S
            'condition' => '9.0/10',
            'description' => 'Tanktop bahan rib elastis warna hitam pekat.',
            'price' => 30000,
            'original_price' => 35000,
            'stock' => 6,
            'image' => 'images/products/RLV-0011.jpeg',
            'badge' => 'Like New',
            'status' => 'available'
        ]);

        Product::create([
            'code' => 'RLV-012',
            'name' => 'Cropped Summer Tank Top White',
            'category_id' => 4,
            'size_id' => 2, // M
            'condition' => '9.0/10',
            'description' => 'Tanktop model crop kasual untuk musim panas.',
            'price' => 35000,
            'original_price' => 40000,
            'stock' => 5,
            'image' => 'images/products/RLV-0012.jpeg',
            'badge' => 'Like New',
            'status' => 'available'
        ]);

        Product::create([
            'code' => 'RLV-013',
            'name' => 'Square Neck Tank Top Sage',
            'category_id' => 4,
            'size_id' => 3, // L
            'condition' => '9.0/10',
            'description' => 'Tanktop kerah kotak warna hijau sage trendi.',
            'price' => 35000,
            'original_price' => 40000,
            'stock' => 4,
            'image' => 'images/products/RLV-0013.jpeg',
            'badge' => 'Like New',
            'status' => 'available'
        ]);

        // --- HOODIE (Category ID: 5) ---
        Product::create([
            'code' => 'RLV-014',
            'name' => 'Heavyweight Fleece Hoodie Grey',
            'category_id' => 5,
            'size_id' => 4, // XL
            'condition' => '9.5/10',
            'description' => 'Hoodie bahan fleece tebal hangat warna abu-abu misty.',
            'price' => 95000,
            'original_price' => 120000,
            'stock' => 8,
            'image' => 'images/products/RLV-0014.jpeg',
            'badge' => 'Like New',
            'status' => 'available'
        ]);

        Product::create([
            'code' => 'RLV-015',
            'name' => 'Minimalist Pastel Hoodie Pink',
            'category_id' => 5,
            'size_id' => 2, // M
            'condition' => '9.2/10',
            'description' => 'Hoodie polos warna pink lembut, bahan lembut di dalam.',
            'price' => 85000,
            'original_price' => 95000,
            'stock' => 4,
            'image' => 'images/products/RLV-0015.jpeg',
            'badge' => 'Like New',
            'status' => 'available'
        ]);

        Product::create([
            'code' => 'RLV-016',
            'name' => 'Vintage Embroidered Hoodie Maroon',
            'category_id' => 5,
            'size_id' => 3, // L
            'condition' => '9.2/10',
            'description' => 'Hoodie warna maroon dengan bordir vintage di dada.',
            'price' => 90000,
            'original_price' => 100000,
            'stock' => 9,
            'image' => 'images/products/RLV-0016.jpeg',
            'badge' => 'Like New',
            'status' => 'available'
        ]);

        // --- SWEATER (Category ID: 6) ---
        Product::create([
            'code' => 'RLV-017',
            'name' => 'Retro Crewneck Sweater Mustard',
            'category_id' => 6,
            'size_id' => 3, // L
            'condition' => '9.8/10',
            'description' => 'Sweater crewneck gaya retro warna kuning mustard.',
            'original_price' => 85000,
            'price' => 75000,
            'stock' => 3,
            'image' => 'images/products/RLV-0017.jpeg',
            'badge' => 'Like New',
            'status' => 'available'
        ]);

        Product::create([
            'code' => 'RLV-018',
            'name' => 'Patterned Knit Sweater Blue',
            'category_id' => 6,
            'size_id' => 2, // M
            'condition' => '9.2/10',
            'description' => 'Sweater rajut motif klasik warna biru tua.',
            'price' => 80000,
            'original_price' => 85000,
            'stock' => 7,
            'image' => 'images/products/RLV-0018.jpeg',
            'badge' => 'Like New',
            'status' => 'available'
        ]);

        Product::create([
            'code' => 'RLV-019',
            'name' => 'Classic Wool Sweater Beige',
            'category_id' => 6,
            'size_id' => 4, // XL
            'condition' => '9.7/10',
            'description' => 'Sweater bahan wol campuran warna beige elegan.',
            'price' => 85000,
            'original_price' => 90000,
            'stock' => 2,
            'image' => 'images/products/RLV-0019.jpeg',
            'badge' => 'Like New',
            'status' => 'available'
        ]);

        Product::create([
            'code' => 'RLV-020',
            'name' => 'Oversized Minimalist Sweatshirt Charcoal',
            'category_id' => 6,
            'size_id' => 5, // XXL
            'condition' => '9.5/10',
            'description' => 'Sweatshirt polos warna abu-abu gelap arang (charcoal) ukuran besar.',
            'price' => 90000,
            'original_price' => 95000,
            'stock' => 4,
            'image' => 'images/products/RLV-0020.jpeg',
            'badge' => 'Like New',
            'status' => 'available'
        ]);
    }
}

