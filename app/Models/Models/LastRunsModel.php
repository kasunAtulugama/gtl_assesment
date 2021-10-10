<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastRunsModel extends Model
{
    use HasFactory;

    protected $table = "tbm_form_last_runrs";

    protected $primary_key = 'id';

    protected $fillable = ['run_date'];

    //Races are belongs to Meeting
    public function runners(){
        return $this->belongsTo(RunnersModel::class);
    }
}
