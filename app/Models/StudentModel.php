<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'Students';
    protected $primaryKey = 'ID';

    protected $allowedFields = [
        'StudentName',
        'StudentSurname',
        'Email',
        'Phone',
        'DateOfBirth',
    ];
}
