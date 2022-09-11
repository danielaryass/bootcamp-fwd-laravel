<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
            //use hasfactori
    use SoftDeletes;
    //declare table
    public $table = 'transaction';

    // harus diisi date yyyy-mm-dd hh:mm
    protected $dates =[
    'created_at',
    'updated_at',
    'deleted_at',
    ];

    //declare fillable atau bisa di isi
    protected $fillable = [
    'appointment_id',
    'fee_doctor',
    'fee_specialist',
    'fee_hospital',
    'sub_total',
    'vat',
    'total',
    'created_at',
    'updated_at',
    'deleted_at',

    ];
}
