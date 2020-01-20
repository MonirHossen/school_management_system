<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    const Active_Status    = 'active';
    const InActive_Status  = 'inactive';

   protected $fillable = [
       'user_id',
       'label_id',
       'student_id',
       'reg_no',
       'exam_id',
       'subject_id',
       'exam_date',
       'marks',
       'status',
   ];
    public function label(){
        return $this->belongsTo(Label::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function exam(){
        return $this->belongsTo(Exam::class);
    }
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
}
