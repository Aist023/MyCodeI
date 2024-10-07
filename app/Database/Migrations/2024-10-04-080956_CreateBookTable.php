<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ID'=>[
                'type'=>'INT',
                'auto_increment'=>true,
            ],
            'BookName'=>[
                'type'=>'NVARCHAR',
                'constraint'=>'255',
            ],
            'Author'=>[
                'type'=>'NVARCHAR',
                'constraint'=>'100',
            ],
            'YearOfPublication'=>[
                'type'=>'YEAR',
                'null'=>true,
            ],
            'Genre' => [
                'type'=>'NVARCHAR',
                'constraint'=>'50',
                'null'=>true,
            ],
        ]);

        $this->forge->addKey('ID', true);
        $this->forge->createTable('Books');
    }

    public function down()
    {
        $this->forge->dropTable('Books');
    }
}
