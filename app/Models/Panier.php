<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
     protected $table = 'panier'; 
    public $fillable=[
        'name',
        'prix',
        'user_id',
        'quantity'
    ];
   public function user(){
    return $this->belongsTo(User::class);
   }
}
