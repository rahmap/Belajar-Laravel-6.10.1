<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey  = 'id_student';
    protected $fillable = ['name_student', 'email_student', 'nisn_student', 'class_student', 'created_at', 'updated_at'];
    protected $guarded = ['id_student'];
}
