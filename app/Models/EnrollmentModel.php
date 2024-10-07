<?php

namespace App\Models;

use CodeIgniter\Model;

class EnrollmentModel extends Model
{
    protected $table = 'Enrollments';
    protected $primaryKey = 'ID';

    protected $allowedFields = [
        'StudentID',
        'CourseID',
        'Grade',
    ];
}