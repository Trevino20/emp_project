<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class student extends Model
{
    use HasFactory;
    protected $table = 'students';
    public $timestamps = false;
    protected $guarded = [];
    //

    public function class()
    {
        return $this->belongsTo(classes::class, 'class_id');
    }
}