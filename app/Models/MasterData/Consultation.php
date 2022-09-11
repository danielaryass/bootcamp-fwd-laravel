<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Consultation extends Model
{
     //use hasfactori
    use SoftDeletes;
    //declare table
    public $table = 'consultation';

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
    public function appointment()
    {
        return $this->hasMany('App\Models\Operational\Appointment','consultation_id');
    }
}
