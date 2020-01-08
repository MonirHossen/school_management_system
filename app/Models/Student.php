<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    const Active_Status   = 'active';
    const InActive_Status = 'inactive';
   protected $fillable = [
       'user_id',
       'label_id',
       'roll',
       'reg_no',
       'reg_code',
       'name',
       'father_name',
       'mother_name',
       'phone',
       'blood_group',
       'address',
       'session',
       'admission_date',
       'date_of_birth',
       'gender',
       'admission_free',
       'image',
       'status',
   ];
   public function label(){
       return $this->belongsTo(Label::class);
   }
}
