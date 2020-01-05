<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    const Active_Status   = 'active';
    const InActive_Status = 'inactive';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'gender',
        'age',
        'blood_group',
        'edu_status',
        'joining_date',
        'salary',
        'description',
        'designation',
        'image',
        'status',
    ];
}
