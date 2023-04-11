<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblCart extends Migration
{
    public function up()
    {
        $fields = [
            'id_cart' => [
                'type' => 'SMALLINT',
                // 'constraint' => 5,
                'auto_increment' => true
            ],
            'bstock_id' => [
                'type' => 'INT',
            ],
            'harga' => [
                'type' => 'DECIMAL',
                'null' => true
            ],
            'qty' => [
                'type' => 'SMALLINT',
                'null' => true
            ],
            'diskon' => [
                'type' => 'DECIMAL',
                'null' => true
            ],
            'total' => [
                'type' => 'DECIMAL',
                'null' => true
            ],
            'user_id' => [
                'type' => 'INT',
            ],
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id_cart');
        $this->forge->addForeignKey('bstock_id', 'barang_stock', 'bstock_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'user', 'user_id', 'CASCADE', 'CASCADE');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('tbl_cart', true, $attributes);
    }

    public function down()
    {
        //
    }
}
