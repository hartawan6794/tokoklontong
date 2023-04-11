<?php

namespace App\Models;

use CodeIgniter\Model;

use function PHPUnit\Framework\isNull;

class StokBarangModel extends Model
{
    protected $table = 'barang_stock';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;

    // dibawah ini untuk mengijinkan jika field2 tersebut akan diisi manual oleh kita
    // protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul'];
    protected $allowedFields = ['bstock_custom_code','bstock_nama_barang', 'bstock_kategori', 'bstock_unit', 'bstock_harga', 'bstock_ready_stock','bstock_catatan','created_at','updated_at'];
    // protected $primaryKey = 'id';


    public function getStokBarang($stok_id = false)
    {

        if ($stok_id == false) {
            return $this->findAll();
            // DIBAWAH INI ADALAH PENULISAN YanG BISA DISINGKAT DENGAN LANGSUNG DI CHAINING dengan $this
            // $builder = $this->table('komik');
            // $builder->like('judul', 'naruto');
            // return $builder;

            // return $this->orderBy('id', 'desc')->findAll();
        } else {
            // ini untuk melanjutkan proses penampilan detail komik yang dipilih
            // return $this->where(['slug' => $keyword])->first();

            return $this->where(['stok_id' => $stok_id])->first();
        }
    }

    // public function getItemNotaDetail($itemnota_id = false, $itemnota_notaid)
    // {

    //     // d($itemnota_id);
    //     if ($itemnota_id == false) {

    //         d("masuk if di model");
    //         return $this->where('itemnota_notaid', $itemnota_notaid)->findAll();
    //         // DIBAWAH INI ADALAH PENULISAN YanG BISA DISINGKAT DENGAN LANGSUNG DI CHAINING dengan $this
    //         // $builder = $this->table('komik');
    //         // $builder->like('judul', 'naruto');
    //         // return $builder;

    //         // return $this->orderBy('id', 'desc')->findAll();
    //     } else {
    //         // ini untuk melanjutkan proses penampilan detail komik yang dipilih
    //         // return $this->where(['slug' => $keyword])->first();

    //         // d($itemnota_id);
    //         d("masuk else di model");

    //         // dd("masuk else di model");
    //         // dd($this->where('itemnota_notaid', $itemnota_notaid)->findAll());

    //         // dd($this->where('itemnota_notaid', $itemnota_notaid)->orWhere('itemnota_id', $itemnota_id)->findAll());

    //         // dd($this->where('itemnota_notaid', $itemnota_notaid)->where('itemnota_id', $itemnota_id)->first());
    //         // return $this->where('itemnota_notaid', $itemnota_notaid)->orWhere('itemnota_id', $itemnota_id)->findAll();

    //         return $this->where(['itemnota_id' => $itemnota_id, 'itemnota_notaid' => $itemnota_notaid])->first();
    //     }
    // }

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

        $keyword_to_int = intval($keyword);
        // variabel diatas ini nanti dikali 1000 karena data tersimpan di database nya adalah dikali 1000 juga
        // dengan tujuan biar bisa menyimpan satuan yang lebih kecil dari seribu rupiah

        return $this->like('stok_id', $keyword)->orLike('stok_jumlah', $keyword)->orLike('stok_namabarang',$keyword)->orLike('stok_satuan',$keyword)->orLike('stok_harga',$keyword)->orLike('stok_deskripsi',$keyword)->findAll();

        // return $this->like('hutang_nama', $keyword)->orLike('hutang_alamat', $keyword)->orLike('hutang_telp', $keyword)->orWhere('hutang_nominal', ($keyword_to_int * 1000))->orLike('hutang_catatan', $keyword)->orWhere('hutang_islunas', $keyword_islunas)->orWhere('hutang_id', $keyword)->findAll();
    }

    // public function fiturCariDetail($keyword, $itemnota_notaid)
    // {
    //     // $builder = $this->table('komik');
    //     // $builder->like('judul',$keyword);
    //     // return $builder;

    //     // return $this->table('komik')->like('judul', $keyword);
    //     // dd($keyword);
    //     // dd($keyword);
    //     // return $this->table('komik')->like('judul', $keyword)->orLike('penulis', $keyword)->orLike('penerbit', $keyword);
    //     // dd($this->table('komik')->like('judul', $keyword));
    //     // return ($this->table('komik')->like('judul', $keyword));
    //     // return $this->like('judul', $keyword);

    //     // dd($this->like('judul', $keyword));

    //     // return $this->Like('omzet_nominal', $keyword)->orLike('omzet_catatan', $keyword)->findAll();
    //     // $keyword->strtolower

    //     // $keyword_to_int = intval($keyword);
    //     // variabel diatas ini nanti dikali 1000 karena data tersimpan di database nya adalah dikali 1000 juga
    //     // dengan tujuan biar bisa menyimpan satuan yang lebih kecil dari seribu rupiah

    //     d("NOTAID: " . $itemnota_notaid);

    //     // $temp = $this->where('itemnota_notaid', $itemnota_notaid)->findAll();
    //     // dd($temp);

    //     // $k = $temp->like('itemnota_namabarang', $keyword)->orLike('itemnota_jumlahbarang', $keyword)->orLike('itemnota_nominaltransaksi', $keyword)->orLike('itemnota_catatan', $keyword)->orWhere('itemnota_notaid', $itemnota_notaid)->findAll();

    //     // $k = $temp->like('itemnota_namabarang', $keyword)->orLike('itemnota_jumlahbarang', $keyword)->orLike('itemnota_nominaltransaksi', $keyword)->orLike('itemnota_catatan', $keyword)->orWhere('itemnota_notaid', $itemnota_notaid)->findAll();
    //     // $temp = [$itemnota_notaid, $itemnota_notaid];

    //     $temp = $this->where('itemnota_notaid', $itemnota_notaid)->like('itemnota_namabarang', $keyword)->orLike('itemnota_jumlahbarang', $keyword)->orLike('itemnota_nominaltransaksi', $keyword)->orLike('itemnota_catatan', $keyword)->findAll();
    //     // dd($temp);

    //     $k = [];
    //     foreach ($temp as $item) {
    //         if ($item['itemnota_notaid'] == 5) {
    //             array_push($k, $item);
    //         }
    //     }

    //     return $k;

    //     // dd($temp->where('itemnota_notaid',$itemnota_notaid));
    //     // return $temp;

    //     // return $this->like('itemnota_namabarang', $keyword)->orLike('itemnota_jumlahbarang', $keyword)->orLike('itemnota_nominaltransaksi', $keyword)->orLike('itemnota_catatan', $keyword)->where('itemnota_notaid', $itemnota_notaid)->findAll();

    //     // return $this->like('itemnota_namabarang', $keyword)->orLike('itemnota_jumlahbarang', $keyword)->orLike('itemnota_nominaltransaksi', $keyword)->orLike('itemnota_catatan', $keyword)->orWhere('itemnota_notaid', $itemnota_notaid)->findAll();

    // }

    // public function fiturCariWaktu($input_date_begin, $input_date_end)
    // {

    //     // dd($input_date_begin);
    //     // kode dibawah WORKS!!!!
    //     return $this->where("itemnota_date >=", $input_date_begin)->where("itemnota_date <=", $input_date_end)->findAll();
    // }

    // public function fiturCariWaktuDetail($input_date_begin, $input_date_end, $itemnota_notaid)
    // {

    //     // dd($input_date_begin);
    //     // kode dibawah WORKS!!!!
    //     return $this->where("itemnota_date >=", $input_date_begin)->where("itemnota_date <=", $input_date_end)->where('itemnota_notaid', $itemnota_notaid)->findAll();
    // }
}
