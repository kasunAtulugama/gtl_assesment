<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingModel extends Model
{

    protected $table = "tbm_meetings";

    protected $primary_key = 'id';

    protected $fillable = [
        'external_id',
        'name'
    ];

    public function races(){
        return $this->hasMany(RacesModel::class);
    }
}
