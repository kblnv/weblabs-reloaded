<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Seeder;


class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $interests = [
            [
                'id' => 'hobbies',
                'name' => 'Мои хобби',
                'items' => ['Работа...', 'Веб - программирование', 'Спорт', 'Чтение'],
            ],
            [
                'id' => 'books',
                'name' => 'Мои любимые книги',
                'items' => ['Джордж Оруэлл - 1984', 'Марк Твен - Письма с земли'],
            ],
            [
                'id' => 'music',
                'name' => 'Моя любимая музыка',
                'items' => ['Mac Miller', 'Red Hot Chili Peppers', 'Nirvana', 'Mac Quayle'],
            ],
            [
                'id' => 'films',
                'name' => 'Мои любимые фильмы',
                'items' => ['Mr.Robot', 'Peaky Blinders', 'Fight Club', 'Berserk 1997'],
            ],
        ];

        foreach ($interests as $interest) {
            Interest::create($interest);
        }
    }
}
