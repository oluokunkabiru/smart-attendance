<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    public function faculty(){
        return $this->belongsTo('App\Models\Faculty');
    }
    public function department(){
        return $this->belongsTo('App\Models\Department');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    public function numbersOfAttendee($id){
        $no = Attendee::where('attendance_id', $id)->get();
        return count($no);
    }

    // public function checkAttended($id){
    //     $check = Attendee::where('id', $id)->exists();
    //     return $check;
    // }
}
