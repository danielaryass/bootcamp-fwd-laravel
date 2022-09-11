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
      public function specialist()
    {
        //2 parameters (path model,field foreign key)
        return $this->belongsTo('App\Models\MasterData\Specialist','specialist_id','id');
    }
    
// one to many
    public function appointment()
    {
        return $this->hasMany('App\Models\Operational\Appointment','doctor_id');
    }
}
