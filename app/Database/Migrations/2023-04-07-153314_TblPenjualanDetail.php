<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblPenjualanDetail extends Migration
{
    public function up()
    {
        $fields = [
            'detail_transaksi_id' => [
                'type' => 'SMALLINT',
                // 'constraint' => 5,
                'auto_increment' => true
            ],
            'transaksi_id' => [
                'type' => 'SMALLINT',
                // 'constraint' => 5,
                // 'auto_increment' => true
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
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('detail_transaksi_id');
        $this->forge->addForeignKey('bstock_id', 'barang_stock', 'bstock_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('transaksi_id', 'tbl_transaksi', 'transaksi_id', 'CASCADE', 'CASCADE');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('tbl_transaksi_detail', true, $attributes);
    }

    public function down()
    {
        //
    }
}
