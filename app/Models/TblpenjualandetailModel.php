<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class TblpenjualandetailModel extends Model {
    
	protected $table = 'tbl_transaksi_detail';
	protected $primaryKey = 'detail_transaksi_id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['transaksi_id', 'bstock_id', 'harga', 'qty', 'diskon', 'total'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    

	
	
}