<?php

use App\Models\Size;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        $sizes = [
            [
                'width' => 20,
                'height' => 40,
            ],
            [
                'width' => 30,
                'height' => 60,
            ],
            [
                'width' => 40,
                'height' => 90,
            ],
        ];


        Size::insert($sizes);
    }

    public function down()
    {
        DB::table('sizes')->truncate();
    }
};
