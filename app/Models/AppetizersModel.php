<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppetizersModel extends Model
{
    use HasFactory;

    protected $table = 'appetizers';
    protected $primaryKey = 'appetizer_id';
    protected $fillable = ['image', 'title', 'price_now', 'price_before'];
}
