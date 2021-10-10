<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormDataModel extends Model
{
    use HasFactory;

    protected $table = "tbm_form_data";

    protected $primary_key = 'id';

    protected $fillable = ['place'];

    //Races are belongs to Meeting
    public function runners(){
        return $this->belongsTo(RunnersModel::class);
    }
}
