<?php

namespace Database\Seeders;

use App\Models\AlbumPhoto;
use Illuminate\Database\Seeder;

class AlbumPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private const PHOTOS_COUNT = 16;

    public function run(): void
    {
        $basePhotosPath = asset('img');
        for ($i = 1; $i <= self::PHOTOS_COUNT; ++$i) {
            AlbumPhoto::create([
                'path' =>  "$basePhotosPath/tommy-shelby$i.jpg",
                'title' => "Томас Шелби $i",
                'alt' => "Томас Шелби $i"
            ]);
        }
    }
}
