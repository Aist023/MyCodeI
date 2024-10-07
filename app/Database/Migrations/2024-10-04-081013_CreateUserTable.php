<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ID'=>[
                'type'=>'INT',
                'auto_increment'=>true,
            ],
            'UserLogin'=>[
                'type'=>'NVARCHAR',
                'constraint'=>'20',
            ],
            'UserPassword'=>[
                'type'=>'NVARCHAR',
                'constraint'=>'30',
            ],
            'UserName'=>[
                'type'=>'NVARCHAR',
                'constraint'=>'20',
            ],
            'UserSurname'=>[
                'type'=>'NVARCHAR',
                'constraint'=>'20',
            ],
            'Country'=>[
                'type'=>'NVARCHAR',
                'constraint'=>'20',
            ],
            'City'=>[
                'type'=>'NVARCHAR',
                'constraint'=>'20',
            ],
        ]);
        
        $this->forge->addKey('ID', true);
        $this->forge->createTable('Users');
    }

    public function down()
    {
        $this->forge->dropTable('Users');
    }
}
