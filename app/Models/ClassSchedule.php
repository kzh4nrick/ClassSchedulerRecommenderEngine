<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    use HasFactory;
    protected $fillable = ['schdule_id', 'day', 'startTime', 'endTime', 'subject_id', 'faculty_id', 'classroom_id'];

}
