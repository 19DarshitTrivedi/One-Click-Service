<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_services extends Model
{
    use HasFactory;
    public $table="sub_services";
    public $timestamps=false;

    public function serviceName(){
        return $this->hasOne(services::class,'id','service_id');
    }
}
