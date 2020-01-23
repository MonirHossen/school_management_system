<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassesFee extends Model
{
    protected $fillable =['label_id','type_id','amount'];

    public function label(){
        return $this->belongsTo(Label::class);
    }
    public function type(){
        return $this->belongsTo(FeeType::class);
    }
}
