<?php

namespace App\Models;

use CodeIgniter\Model;

use function PHPUnit\Framework\isNull;

class SupplierContactModel extends Model
{
    protected $table = 'supplier_contact';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;

    // dibawah ini untuk mengijinkan jika field2 tersebut akan diisi manual oleh kita
    // protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul'];
    protected $allowedFields = ['supp_nama', 'supp_jenisproduk', 'supp_namaproduk', 'supp_catatanproduk', 'supp_nomorwa', 'supp_telp1', 'supp_telp1', 'supp_telp2', 'supp_catatantambahan', 'supp_alamat'];
    // protected $primaryKey = 'id';



    public function getSupplier($supp_id = false)
    {

        if ($supp_id == false) {
            return $this->findAll();
            // DIBAWAH INI ADALAH PENULISAN YanG BISA DISINGKAT DENGAN LANGSUNG DI CHAINING dengan $this
            // $builder = $this->table('komik');
            // $builder->like('judul', 'naruto');
            // return $builder;

            // return $this->orderBy('id', 'desc')->findAll();
        } else {
            // ini untuk melanjutkan proses penampilan detail komik yang dipilih
            // return $this->where(['slug' => $keyword])->first();

            return $this->where(['supp_id' => $supp_id])->first();
        }
    }

    public function fiturCari($keyword)
    {
        // $builder = $this->table('komik');
        // $builder->like('judul',$keyword);
        // return $builder;

        // return $this->table('komik')->like('judul', $keyword);
        // dd($keyword);
        // dd($keyword);
        // return $this->table('komik')->like('judul', $keyword)->orLike('penulis', $keyword)->orLike('penerbit', $keyword);
        // dd($this->table('komik')->like('judul', $keyword));
        // return ($this->table('komik')->like('judul', $keyword));
        // return $this->like('judul', $keyword);

        // dd($this->like('judul', $keyword));

        // return $this->Like('omzet_nominal', $keyword)->orLike('omzet_catatan', $keyword)->findAll();
        // $keyword->strtolower

        // variabel diatas ini nanti dikali 1000 karena data tersimpan di database nya adalah dikali 1000 juga
        // dengan tujuan biar bisa menyimpan satuan yang lebih kecil dari seribu rupiah

        // dd($keyword);

        return $this->like('supp_nama', $keyword)->orLike('supp_jenisproduk', $keyword)->orLike('supp_namaproduk', $keyword)->orLike('supp_catatanproduk', $keyword)->orLike('supp_nomorwa', $keyword)->orLike('supp_telp1', $keyword)->orLike('supp_telp2', $keyword)->orLike('supp_catatantambahan', $keyword)->orLike('supp_alamat', $keyword)->findAll();
        // return $this->like('hutang_nama', $keyword)->orLike('hutang_alamat', $keyword)->orLike('hutang_telp', $keyword)->orWhere('hutang_nominal', ($keyword_to_int * 1000))->orLike('hutang_catatan', $keyword)->orWhere('hutang_islunas', $keyword_islunas)->orWhere('hutang_id', $keyword)->findAll();
    }

    public function fiturCariWaktu($input_date_begin, $input_date_end)
    {

        // dd($input_date_begin);
        // kode dibawah WORKS!!!!
        return $this->where("created_at >=", $input_date_begin)->where("created_at <=", $input_date_end)->findAll();
    }

    public function getSupplierName()
    {


        // return $this->findAll();
        // dd($this->findColumn("supp_nama"));

        // dd("asd");

        // dibawah ini bisa
        return $this->findColumn("supp_nama");

        // $temp = $this->findColumn("supp_nama");;
        // foreach ($temp as $nama) {
        //     // $return_arr[] = $nama->nama_buku;
        //     $return_arr[] = $nama;
        // }

        // dd($return_arr);
        // return $return_arr;
    }

    // public function getSupplierName($searchTerm)
    // {
    //     return $this->like('supp_nama', $searchTerm)->findAll();
    // }
}
