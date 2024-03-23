<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PopulateRecordsTable extends Migration
{
    public function up()
    {
        $maxPoint = DB::table('points')
            ->select('game', DB::raw('MAX(points) as max_points'))
            ->groupBy('game')
            ->get();

        foreach ($maxPoint as $maxPoint) {
            DB::table('records')
                ->where('game_name', $maxPoint->game)
                ->update(['points' => $maxPoint->max_points]);
        }
    }

    public function down()
    {
    }
}
