<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class support extends Model
{
    //
    
    use HasFactory;

    protected $table = 'supports';
    protected $guarded = [];    
    public $timestamps = false;

}