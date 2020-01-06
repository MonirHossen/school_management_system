<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    const Active_Status   = 'active';
    const InActive_Status = 'inactive';
    protected $fillable = [
        'name',
        'status',
    ];
    public function subjects(){
        return $this->hasMany(Subject::class);
    }
}
