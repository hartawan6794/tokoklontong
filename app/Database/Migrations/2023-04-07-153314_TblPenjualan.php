<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblPenjualan extends Migration
{
    public function up()
    {
        $fields = [
            'transaksi_id' => [
                'type' => 'SMALLINT',
                // 'constraint' => 5,
                'auto_increment' => true
            ],
            'invoice' => [
                'type' => 'varchar',
                'constraint' => 50
            ],
            'nm_kostumer' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'total_harga' => [
                'type' => 'DECIMAL',
                'null' => true
            ],
            'diskon' => [
                'type' => 'DECIMAL',
                'null' => true
            ],
            'harga_final' => [
                'type' => 'DECIMAL',
                'null' => true
            ],
            'tunai' => [
                'type' => 'DECIMAL',
                'null' => true
            ],
            'kembalian' => [
                'type' => 'DECIMAL',
                'null' => true
            ], 
            'catatan' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'user_id' => [
                'type' => 'INT',
            ],
            'tanggal' => [
                'type' => 'DATE'
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ]
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('transaksi_id');
        $this->forge->addForeignKey('user_id','user','user_id','CASCADE','CASCADE');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('tbl_transaksi', true, $attributes);

    }

    public function down()
    {
        //
    }
}
