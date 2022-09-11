<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Role extends Model
{
        //use hasfactori
    use SoftDeletes;
    //declare table
    public $table = 'role';

    // harus diisi date yyyy-mm-dd hh:mm
    protected $dates =[
    'created_at',
    'updated_at',
    'deleted_at',
    ];

    //declare fillable atau bisa di isi
    protected $fillable = [
    'title',
    'created_at',
    'updated_at',
    'deleted_at',

    ];
    public function permission_role()
    {
        return $this->hasMany('App\Models\ManagementAccess\PermissionRole','role_id');
    }
    public function role_user()
    {
        return $this->hasMany('App\Models\Operational\RoleUser','role_id');
    }
}
