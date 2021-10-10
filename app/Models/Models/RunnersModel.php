<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RunnersModel extends Model
{
    protected $table = "tbm_runners";

    protected $primary_key = 'id';

    protected $fillable = ['runner_name','age','sex','color'];

    public function lastruns(){
        return $this->hasMany(LastRunsModel::class);
    }
    public function formdata(){
        return $this->hasOne(FormDataModel::class);
    }
}
