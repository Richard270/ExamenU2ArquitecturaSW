<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Teacher extends Model
{
    use HasFactory;

    protected $table = "teachers";

    protected $fillable = [
        'id',
        'name',
        'first_surname',
        'second_surname',
        'degree'

    ];

    public $timestamps = false;

    public function courses()
    {
        return $this->belongsToMany(
            Course::class,
            'teachers_courses',
            'teachers_id',
            'courses_id'
        );
    }

}
