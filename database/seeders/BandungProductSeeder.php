<?php
 
namespace Database\Seeders;
 
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
 
class BandungProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Kopi Arabika Kampung Dayang',
                'description' => 'Kopi spesialti dari petani lokal Bandung',
                'latitude' => -6.968753,
                'longitude' => 107.636412,
                'price' => 150000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Keripik Tempe Rumah Sejahtera',
                'description' => 'Keripik tempe homemade dengan bumbu rahasia',
                'latitude' => -6.979452,
                'longitude' => 107.624875,
                'price' => 35000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Batik Tulis Karya Mandiri',
                'description' => 'Batik asli buatan pengrajin Bandung',
                'latitude' => -6.962395,
                'longitude' => 107.639281,
                'price' => 750000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Dodol Garut Premium',
                'description' => 'Dodol tradisional dengan kualitas pilihan',
                'latitude' => -6.983217,
                'longitude' => 107.621539,
                'price' => 100000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Tas Rajut Kreatif',
                'description' => 'Tas rajut handmade dengan desain unik',
                'latitude' => -6.970156,
                'longitude' => 107.643798,
                'price' => 250000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Pisang Goreng Kriuk Mbak Sari',
                'description' => 'Pisang goreng renyah dengan balutan tepung special',
                'latitude' => -6.976541,
                'longitude' => 107.633217,
                'price' => 15000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Sabun Herbal Alami',
                'description' => 'Sabun berbahan dasar minyak alami dan ekstrak tumbuhan',
                'latitude' => -6.965287,
                'longitude' => 107.637495,
                'price' => 50000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Sepatu Kulit Bandung',
                'description' => 'Sepatu kulit asli buatan pengrajin lokal',
                'latitude' => -6.980123,
                'longitude' => 107.628746,
                'price' => 600000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Tahu Sumedang Crispy',
                'description' => 'Tahu goreng renyah khas Sumedang',
                'latitude' => -6.972456,
                'longitude' => 107.641329,
                'price' => 25000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Jaket Denim Lokal',
                'description' => 'Jaket denim kualitas premium buatan Bandung',
                'latitude' => -6.967891,
                'longitude' => 107.635214,
                'price' => 450000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Kacang Telur Pedas',
                'description' => 'Kacang sangrai dengan bumbu pedas menggugah selera',
                'latitude' => -6.981234,
                'longitude' => 107.626789,
                'price' => 30000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Tas Kulit Vintage',
                'description' => 'Tas kulit dengan desain klasik dan modern',
                'latitude' => -6.974567,
                'longitude' => 107.642891,
                'price' => 500000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Kue Lupis Tradisional',
                'description' => 'Kue tradisional dengan bumbu kelapa parut',
                'latitude' => -6.969876,
                'longitude' => 107.637654,
                'price' => 20000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Kemeja Batik Modern',
                'description' => 'Kemeja batik dengan potongan slim fit',
                'latitude' => -6.976543,
                'longitude' => 107.630987,
                'price' => 350000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Kopi Robusta Pegunungan',
                'description' => 'Kopi robusta langsung dari petani pegunungan',
                'latitude' => -6.982345,
                'longitude' => 107.625678,
                'price' => 120000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Sepatu Olahraga Lokal',
                'description' => 'Sepatu running berbahan ringan dan nyaman',
                'latitude' => -6.963456,
                'longitude' => 107.640123,
                'price' => 400000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Sambal Terasi Homemade',
                'description' => 'Sambal terasi pedas buatan rumah',
                'latitude' => -6.975678,
                'longitude' => 107.632456,
                'price' => 40000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Jam Tangan Kayu',
                'description' => 'Jam tangan unik berbahan dasar kayu lokal',
                'latitude' => -6.968765,
                'longitude' => 107.638901,
                'price' => 550000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Carica Olahan',
                'description' => 'Manisan carica segar dari pegunungan',
                'latitude' => -6.979876,
                'longitude' => 107.627654,
                'price' => 75000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Tas Rajut Etnik',
                'description' => 'Tas rajut dengan motif etnik tradisional',
                'latitude' => -6.971234,
                'longitude' => 107.644567,
                'price' => 300000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        Product::insert($products);
    }
}
