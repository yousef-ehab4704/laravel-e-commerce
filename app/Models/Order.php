<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
   use HasApiTokens, HasFactory, Notifiable;

    use HasFactory;
 protected $fillable = ['user_id', 'total', 'product_id'];   
 public function product(){
    return $this->belongsToMany(Product::class,'order_product', 'order_id', 'product_id')->withPivot('quantity');
 }
 public function user(){
    return $this->hasOne(User::class, 'id', 'user_id');
    
 }   
}
                                                      