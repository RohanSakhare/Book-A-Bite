<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DessertModel extends Model
{
    use HasFactory;
    protected $table = 'dessert';
    protected $primaryKey = 'dessert_id';
    protected $fillable = ['image', 'title', 'price_now', 'price_before'];
}
