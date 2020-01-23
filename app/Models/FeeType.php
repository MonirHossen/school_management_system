<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeType extends Model
{
    const Active_Status   = 'active';
    const InActive_Status = 'inactive';

    protected $fillable = ['fee_type','status'];

    public function classesFees(){
        return $this->hasMany(ClassesFee::class);
    }
}
