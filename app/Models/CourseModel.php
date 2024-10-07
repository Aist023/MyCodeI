<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table = 'Courses';
    protected $primaryKey = 'ID';

    protected $allowedFields = [
        'CourseName',
        'Description',
        'TrivialityInDays',
        'Vikladach',
    ];
}