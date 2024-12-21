<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class classes extends Model
{
    //
    use HasFactory;

    protected $table = 'classes';
    protected $guarded = [];    
    public $timestamps = false;

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }

}