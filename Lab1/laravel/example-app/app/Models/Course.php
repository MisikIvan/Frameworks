<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'credits',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }


    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments')
            ->withPivot('grade')
            ->withTimestamps();
    }
}
