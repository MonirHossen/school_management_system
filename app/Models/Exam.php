<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'exam_type',
        'status'
    ];
    public function results(){
        return $this->hasMany(Result::class);
    }
}
