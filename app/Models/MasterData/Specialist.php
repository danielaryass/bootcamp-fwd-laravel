<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Specialist extends Model
{
     //use hasfactori
    use SoftDeletes;
    //declare table
    public $table = 'specialist';

    // harus diisi date yyyy-mm-dd hh:mm
    protected $dates =[
    'created_at',
    'updated_at',
    'deleted_at',
    ];

    //declare fillable atau bisa di isi
    protected $fillable = [
    'name'.
    'price',
    'created_at',
    'updated_at',
    'deleted_at',

    ];
      public function doctor()
    {
        //3 parameters (path model,field foreign key, field primary key from table hasMany/hasone)
        return $this->hasMany('App\Models\Operational\Doctor','specialist_id');
    }
}
