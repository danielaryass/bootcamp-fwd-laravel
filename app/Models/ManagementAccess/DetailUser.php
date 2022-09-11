<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailUser extends Model
{
    use SoftDeletes;
    //declare table
    public $table = 'detail_user';

    // harus diisi date yyyy-mm-dd hh:mm
    protected $dates =[
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //declare fillable atau bisa di isi
    protected $fillable = [
    'user_id' ,
    'type_user_id' ,
    'contact',
    'address',
    'photo',
    'gender',
    'age',
    'created_at',
    'updated_at',
    'deleted_at',

    ];
}
