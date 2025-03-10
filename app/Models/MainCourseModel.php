<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCourseModel extends Model
{
    use HasFactory;
    protected $table = 'maincourse';
    protected $primaryKey = 'main_course_id';
    protected $fillable = ['image', 'title', 'price_now', 'price_before'];
}
