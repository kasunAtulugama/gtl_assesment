<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RacesModel extends Model
{
    use HasFactory;

    protected $table = "tbm_races";

    protected $primary_key = 'meeting_id';

    //Races are belongs to Meeting
    public function meeting(){
        return $this->belongsTo(MeetingModel::class);
    }

}
