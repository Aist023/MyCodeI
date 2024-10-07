<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'Books';
    protected $primaryKey = 'ID';

    protected $allowedFields = [
        'BookName',
        'Author',
        'YearOfPublication',
        'Genre',
    ];
}
