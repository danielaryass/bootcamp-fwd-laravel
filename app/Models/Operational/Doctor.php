<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
            //use hasfactori
    use SoftDeletes;
    //declare table
    public $table = 'doctor';

    // harus diisi date yyyy-mm-dd hh:mm
    protected $dates =[
    'created_at',
    'updated_at',
    'deleted_at',
    ];

    //declare fillable atau bisa di isi
    protected $fillable = [
    'specialist_id',
    'name',
    'fee',
    'photo',
    'created_at',
    'updated_at',
    'deleted_at',

    ];
}