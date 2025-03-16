<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FearturesModel extends Model
{


    use HasFactory;

    protected $table = 'features';
    protected $primaryKey = 'features_id';
    protected $fillable = ['title', 'description'];


}

