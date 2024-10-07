<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ID'=>[
                'type'=>'INT',
                'auto_increment'=>true,
            ],
            'CourseName'=>[
                'type'=>'NVARCHAR',
                'constraint'=>'255',
            ],
            'Description'=>[
                'type'=>'TEXT',
                'null'=>true,
            ],
            'TrivialityInDays'=>[
                'type'=>'INT',
                'null'=>true,
            ],
            'Vikladach' => [
                'type'=>'NVARCHAR',
                'constraint'=>'100',
                'null'=>true,
            ],
        ]);

        $this->forge->addKey('ID', true);
        $this->forge->createTable('Courses');
    }

    public function down()
    {
        $this->forge->dropTable('Courses');
    }
}
