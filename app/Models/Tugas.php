<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tugas extends Model
{
    use HasFactory;
    protected $table = 'tugas';
    protected $guarded = [];
    protected $dates = ['created_at'];

    public function city(){
        return $this->belongsTo(City::class, 'id_pulau', 'id');
    }
}
