<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportes extends Model
{
    public function user()
    {
    //   return $this->belongsTo('App\User' ,'id','userid');
    }
    
    use HasFactory;

}
