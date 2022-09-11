<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeUser extends Model
{
        //use hasfactori
    use SoftDeletes;
    //declare table
    public $table = 'type_user';

    // harus diisi date yyyy-mm-dd hh:mm
    protected $dates =[
    'created_at',
    'updated_at',
    'deleted_at',
    ];

    //declare fillable atau bisa di isi
    protected $fillable = [
    'name'.
    'created_at',
    'updated_at',
    'deleted_at',

    ];
    public function detail_user()
    {
        //2 parameters (path model,field foreign key)
        return $this->hasMany('App\Models\ManagementAccess\DetailUser','type_user_id');
    }
}
