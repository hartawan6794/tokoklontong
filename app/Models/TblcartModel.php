<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class TblcartModel extends Model {
    
	protected $table = 'tbl_cart';
	protected $primaryKey = 'id_cart';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['bstock_id', 'harga', 'qty', 'diskon', 'total', 'user_id'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;  
	
	
	public function get_cart($params = null)
    {
        $this->select('*')->join('stok_barang', 'stok_barang.stok_id = tbl_cart.stok_id');
        if($params != null){
            $this->where($params);
        }
        
        $this->where('user_id','0');
        $query = $this->get()->getResult();
        return $query;
    }
	
}