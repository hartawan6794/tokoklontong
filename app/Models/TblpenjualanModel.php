<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class TblpenjualanModel extends Model {
    
	protected $table = 'tbl_transaksi';
	protected $primaryKey = 'transaksi_id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['invoice', 'nm_kostumer', 'total_harga', 'diskon', 'harga_final', 'tunai', 'kembalian', 'catatan', 'user_id', 'tanggal', 'created_at'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;   
	
	//algoritma no invoice
	public function invoice_no()
    {
        $sql = "SELECT MAX(MID(invoice,9,4)) AS invoice_no 
                FROM tbl_transaksi
                WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(),'%d%m%y')";
        $query = $this->db->query($sql);
        if($query){
            $row = $query->getResult();
            $n = ((int) $row[0]->invoice_no) +1;
            $no = sprintf("%'.04d", $n);
        }else{
            $no = "0001";
        }
        $invoice = "TK".date('dmy').$no;
        return $invoice;
    }


    function update_cart_qty($post)
    {
        $sql = "UPDATE tbl_cart SET harga = '$post[harga]',
                qty = qty+'$post[qty]',
                total = '$post[harga]' * qty
                WHERE bstock_id = '$post[bstock_id]'";
        $this->db->query($sql);
        if($this->db->affectedRows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function delete_cart($params = null)
    {
        if($params != null){
            $this->db->where($params);
        }
        $this->db->delete('tbl_cart');
    }

    public function edit_cart($post)
    {
        $params = array(
            'price' => $post['price'],
            'qty' => $post['qty'],
            'discount_item' => $post['discount'],
            'total' => $post['total'],
        );
        $this->db->where('cart_id', $post['cart_id']);
        $this->db->update('tbl_cart', $params);
    }
	
	
}