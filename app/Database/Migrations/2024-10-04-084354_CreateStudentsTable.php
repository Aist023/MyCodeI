<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ID'=>[
                'type'=>'INT',
                'auto_increment'=>true,
            ],
            'StudentName'=>[
                'type'=>'NVARCHAR',
                'constraint'=>'100',
            ],
            'StudentSurname' => [
                'type'=>'NVARCHAR',
                'constraint'=>'100',
            ],
            'Email' => [
                'type'=>'NVARCHAR',
                'constraint'=>'150',
            ],
            'Phone' => [
                'type'=>'NVARCHAR',
                'constraint'=>'20',
            ],
            'DateOfBirth'=>[
                'type'=>'DATE',
            ],
        ]);

        $this->forge->addKey('ID', true);
        $this->forge->createTable('Students');
    }

    public function down()
    {
        $this->forge->dropTable('Students');
    }
}
