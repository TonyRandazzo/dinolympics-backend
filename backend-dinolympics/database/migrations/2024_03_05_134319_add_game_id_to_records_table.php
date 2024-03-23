<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddGameIdToRecordsTable extends Migration
{
    public function up()
    {
        Schema::table('records', function (Blueprint $table) {
            $table->foreignId('game_id')->nullable()->constrained();
        });
    }

    public function down()
    {
        Schema::table('records', function (Blueprint $table) {
            $table->dropForeign(['game_id']);
            $table->dropColumn('game_id');
        });
    }

    public function getRecordsData()
    {
        $recordsData = DB::table('records')
            ->join('games', 'records.game_id', '=', 'games.id')
            ->select('records.id', 'games.name', 'records.points')
            ->get();

        return $recordsData;
    }
}
