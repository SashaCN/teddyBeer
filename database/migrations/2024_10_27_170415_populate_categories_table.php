<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        $categories = [
            [
                'title' => 'М\'які ведмедики',
                'description' => 'Класичні плюшеві ведмедики різних розмірів та кольорів',
            ],
            [
                'title' => 'Тварини дикої природи',
                'description' => 'Плюшеві леви, тигри, слони та інші екзотичні тварини',
            ],
            [
                'title' => 'Домашні улюбленці',
                'description' => 'М\'які іграшки у вигляді котів, собак та інших домашніх тварин',
            ],
            [
                'title' => 'Казкові персонажі',
                'description' => 'Улюблені герої з мультфільмів та дитячих казок',
            ],
            [
                'title' => 'Морські створіння',
                'description' => 'Дельфіни, китики, восьминоги та інші морські мешканці',
            ],
            [
                'title' => 'Динозаври',
                'description' => 'Колекція м\'яких іграшок у вигляді різних видів динозаврів',
            ],
            [
                'title' => 'Єдинороги та фентезі',
                'description' => 'Магічні створіння та фантастичні персонажі',
            ],
            [
                'title' => 'Подушки-тварини',
                'description' => 'Декоративні подушки у вигляді милих тварин',
            ],
            [
                'title' => 'Інтерактивні плюшеві іграшки',
                'description' => 'Іграшки зі звуковими та світловими ефектами',
            ],
            [
                'title' => 'Колекційні іграшки',
                'description' => 'Лімітовані та спеціальні серії плюшевих іграшок',
            ],
        ];


        Category::insert($categories);
    }

    public function down()
    {
        DB::table('categories')->truncate();
    }
};
