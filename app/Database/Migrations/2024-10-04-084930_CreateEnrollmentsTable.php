<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEnrollmentsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ID' => [
                'type'=>'INT',
                'auto_increment'=>true,
            ],
            'StudentID'=>[
                'type'=>'INT',
                'null'=>false,
            ],
            'CourseID' => [
                'type'=>'INT',
                'null'=>false,
            ],
            'Grade'=>[
                'type'=>'FLOAT',
                'null'=>true,
            ],
        ]);

        $this->forge->addKey('ID', true);
        $this->forge->addForeignKey('StudentID', 'Students', 'ID', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('CourseID', 'Courses', 'ID', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Enrollments');
    }

    public function down()
    {
        $this->forge->dropTable('Enrollments');
    }
}
