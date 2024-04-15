<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mission;

class Record extends Model
{
    protected $fillable = ['mission_id', 'game_name', 'points'];
    public function mission(){
        return $this->belongsTo(Mission::class);
    }
}