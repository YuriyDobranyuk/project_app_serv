<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'topic', 'message', 'fileId'
    ];
    public function users(){
        return $this->belongsToMany(User::class, 'orders_user', 'orderId', 'userId');
    }
    public function file(){
        return $this->hasOne(File::class, 'id', 'fileId');
    }
}
