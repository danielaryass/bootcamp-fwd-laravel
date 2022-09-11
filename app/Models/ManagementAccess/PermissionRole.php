<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PermissionRole extends Model
{
     //use hasfactori
    use SoftDeletes;
    //declare table
    public $table = 'permission_role';

    // harus diisi date yyyy-mm-dd hh:mm
    protected $dates =[
    'created_at',
    'updated_at',
    'deleted_at',
    ];

    //declare fillable atau bisa di isi
    protected $fillable = [
    'permission_id',
    'role_id', 
    'created_at',
    'updated_at',
    'deleted_at',

    ];
}
