<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    const Active_Status    = 'active';
    const InActive_Status  = 'inactive';
    protected $fillable = [
        'label_id',
        'name',
        'status',
    ];
    public function label(){
        return $this->belongsTo(Label::class);
    }
}
