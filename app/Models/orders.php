<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    protected $table='orders';
    public $timestamps=false;

    public function userNames()
    {
        return $this->hasOne(user::class,'id','user_id');
    }
    public function serviceNames()
    {
        return $this->hasOne(sub_services::class,'id','sub_service_id');
    }
}
