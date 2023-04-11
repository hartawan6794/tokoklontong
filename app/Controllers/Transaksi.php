<?php

namespace App\Controllers;

use App\Database\Migrations\TblPenjualanDetail;
use App\Models\StokBarangModel;
use App\Models\TblcartModel;
use App\Models\TblpenjualandetailModel;
use App\Models\TblpenjualanModel;

class Transaksi extends BaseController
{

    public function __construct()
    {
        // memanggil class model barang pada class transaksi
        $this->stokBarang = new StokBarangModel();
        $this->validation =  \Config\Services::validation();
        $this->cart = new TblcartModel();
        $this->penjualan = new TblpenjualanModel();
        $this->penjualanDetail = new TblpenjualandetailModel();
        $this->session = session();
    }

    public function index()
    {
        $data = [
            'title' => 'transaksi',
            //mendapatkan nomor invoice yang telah di generate otomatis di TblPenjualanModel
            'invoice' => $this->penjualan->invoice_no(),
            //mengambil seluruh data barang lalu mengirim ke index view transaksi
            'item' => $this->stokBarang->get()->getResult(),
            'kasir' => $this->session->get('username') ? $this->session->get('username') : 'kasir'
        ];
        return view('transaksi/index', $data);
    }

    public function getCart()
    {
        $response = array();

        $bstock_id = $this->request->getPostGet('bstock_id');

        $data = $this->cart->select('qty')->where('bstock_id', $bstock_id)->first();

        $response['success'] = true;
        $response['data'] = $data ? $data->qty : 0;

        return $this->response->setJSON($response);
    }

    public function getCartData()
    {
        $response = $data['data'] = array();

        $result = $this->cart->select()->join('barang_stock', 'barang_stock.bstock_id = tbl_cart.bstock_id')->where('user_id', '0')->findAll();
        $no = 1;
        foreach ($result as $key => $value) {

            $ops = '<button id="update_cart" data-bs-toggle="modal" data-bs-target="#modal-item-edit" data-id_cart="' . $value->id_cart . '" data-product="' . $value->bstock_nama_barang . '" data-harga="' . $value->harga . '" data-qty="' . $value->qty . '" data-stock="' . $value->bstock_ready_stock . '" data-diskon="' . $value->diskon . '" data-total="' . $value->total . '" class="btn btn-xs btn-primary">
            <i class="fas fa-pencil-alt"></i> Ubah
        </button>';
            $ops .= ' <button id="delete_cart" data-id_cart="' . $value->id_cart . '" class="btn btn-xs btn-danger">
            <i class="fas fa-trash"></i> Hapus
        </button>';

            $data['data'][$key] = array(
                $no++,
                $value->bstock_custom_code,
                $value->bstock_nama_barang,
                $value->harga,
                $value->qty,
                $value->diskon,
                '<div id="total">' . $value->total . '</div>',
                // $value->user_id,

                $ops
            );
        }

        return $this->response->setJSON($data);
    }

    public function getSubTotal()
    {

        $response = array();

        $data = $this->cart->where('user_id', $this->session->get('user_id') ? $this->session->get('user_id') : '0')->findAll();

        $sub_total = 0;
        foreach ($data as $value) {
            $sub_total += $value->total;
        }

        $response['success'] = true;
        $response['data'] = $data ? $sub_total : 0;

        return $this->response->setJSON($response);
    }

    public function addCart()
    {

        $response = array();
        $fields['bstock_id'] = $this->request->getPost('bstock_id');
        $fields['harga'] = $this->request->getPost('harga');
        $fields['qty'] = $this->request->getPost('qty');
        $data = $this->cart->where('bstock_id', $fields['bstock_id'])->countAllResults();
        if ($data > 0) {
            if ($this->penjualan->update_cart_qty($fields)) {
                $response['success'] = true;
            } else {
                $response['success'] = false;
            }
        } else {
            $params = array(
                // 'cart_id' => $cart_no,
                'bstock_id' => $fields['bstock_id'],
                'harga' => $fields['harga'],
                'qty' => $fields['qty'],
                'total' => $fields['harga'] * $fields['qty'],
                'diskon' => 0,
                'user_id' => $this->session->get('user_id') ? $this->session->get('user_id') : '0'
            );
            if ($this->cart->insert($params)) {
                $response['success'] = true;
            } else {
                $response['success'] = false;
            }
        }

        return $this->response->setJSON($response);
    }

    public function cart_delete()
    {
        $response = array();

        $id = $this->request->getPost('id_cart');
        $user_id = $this->session->get('user_id') ? $this->session->get('user_id') : '0';
        if (!$id) {
            if ($this->cart->where('user_id', $user_id)->delete()) {
                $response['success'] = true;
            } else {
                $response['success'] = false;
            }
        } else {
            if (!$this->validation->check($id, 'required|numeric')) {

                throw new \CodeIgniter\Exceptions\PageNotFoundException();
            } else {
                if ($this->cart->where('id_cart', $id)->delete()) {
                    $response['success'] = true;
                } else {
                    $response['success'] = false;
                }
            }
        }
        return $this->response->setJSON($response);
    }

    public function edit_cart()
    {
        $response = array();

        $fields['id_cart'] = $this->request->getPost('id_cart');
        $fields['harga'] = $this->request->getPost('harga');
        $fields['qty'] = $this->request->getPost('qty');
        $fields['diskon'] = $this->request->getPost('diskon');
        $fields['total'] = $this->request->getPost('total');
        if ($this->cart->update($fields['id_cart'], $fields)) {
            $response['success'] = true;
        } else {
            $response['success'] = false;
        }

        return $this->response->setJSON($response);
    }

    public function prosesPembayaran()
    {
        $response = array();

        $user_id = $this->session->get('user_id') ? $this->session->get('user_id') : '0';

        $fields['transaksi_id'] = $this->request->getPost('transaksi_id');
        $fields['invoice'] = $this->penjualan->invoice_no();
        $fields['nm_kostumer'] = $this->request->getPost('nm_kostumer');
        $fields['total_harga'] = $this->request->getPost('total_harga');
        $fields['diskon'] = $this->request->getPost('diskon');
        $fields['harga_final'] = $this->request->getPost('harga_final');
        $fields['tunai'] = $this->request->getPost('tunai');
        $fields['kembalian'] = $this->request->getPost('kembalian');
        $fields['catatan'] = $this->request->getPost('catatan');
        $fields['user_id'] = $user_id;
        $fields['tanggal'] = $this->request->getPost('date');
        $fields['created_at'] = date('Y-m-d H:i:s');


        if ($this->penjualan->insert($fields)) {
            $transaksi_id = $this->penjualan->insertID();
            $carts = $this->cart->where('user_id', $user_id)->findAll();

            $row = [];
            foreach ($carts as $cart) {
                array_push($row, array(
                    'transaksi_id' => $transaksi_id,
                    'bstock_id' => $cart->bstock_id,
                    'harga' => $cart->harga,
                    'diskon' => $cart->diskon,
                    'qty' => $cart->qty,
                    'total' => ($cart->harga - $cart->diskon) * $cart->qty
                ));
            }

            if ($this->penjualanDetail->insertBatch($row)) {
                $this->cart->where('user_id', $user_id)->delete();
                $response['success'] = true;
                $response['transaksi_id'] = $transaksi_id;
            } else {
                $response['success'] = false;
            }
        } else {
            $response['success'] = false;
        }
        return $this->response->setJSON($response);
    }

    public function cetak($id)
    {

        // $id = $this->request->getPostGet('id');
        $penjualan = $this->penjualan->select('tbl_transaksi.*,u.user_username')->join('user u', 'tbl_transaksi.user_id = u.user_id')->where('transaksi_id', $id)->first();

        $transaksi_detail = $this->penjualanDetail->select('*')->join('barang_stock sb', 'tbl_transaksi_detail.bstock_id = sb.bstock_id')->where('transaksi_id', $id)->findAll();



        $data = array(
            'penjualan' =>  $penjualan,
            'transaksi_detail' => $transaksi_detail,
        );
        return view('transaksi/receipt_print', $data);
    }
}
