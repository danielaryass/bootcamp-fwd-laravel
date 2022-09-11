<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
            //use hasfactori
    use SoftDeletes;
    //declare table
    public $table = 'appointment';

    // harus diisi date yyyy-mm-dd hh:mm
    protected $dates =[
    'created_at',
    'updated_at',
    'deleted_at',
    ];

    //declare fillable atau bisa di isi
    protected $fillable = [
    'doctor_id',
    'user_id',
    'consultation_id',
    'level',
    'date',
    'time',
    'status',
    'created_at',
    'updated_at',
    'deleted_at',

    ];
}
