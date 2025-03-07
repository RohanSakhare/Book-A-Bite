<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $primaryKey = 'bookings_id';
    protected $fillable = [ 'name', 'email','number','date','time','guests','request','table_id'];
}
