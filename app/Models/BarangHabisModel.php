<?php

namespace App\Models;

use CodeIgniter\Model;

use function PHPUnit\Framework\isNull;

class BarangHabisModel extends Model
{
    protected $table = 'barang_habis';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;

    // dibawah ini untuk mengijinkan jika field2 tersebut akan diisi manual oleh kita
    // protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul'];
    protected $allowedFields = ['habis_namabarang', 'habis_sudahdibeli', 'habis_date', 'habis_catatan'];
    // protected $primaryKey = 'id';



    public function getHabis($habis_id = false)
    {

        if ($habis_id == false) {
            return $this->findAll();
            // DIBAWAH INI ADALAH PENULISAN YanG BISA DISINGKAT DENGAN LANGSUNG DI CHAINING dengan $this
            // $builder = $this->table('komik');
            // $builder->like('judul', 'naruto');
            // return $builder;

            // return $this->orderBy('id', 'desc')->findAll();
        } else {
            // ini untuk melanjutkan proses penampilan detail komik yang dipilih
            // return $this->where(['slug' => $keyword])->first();

            return $this->where(['habis_id' => $habis_id])->first();
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

        $keyword_to_int = intval($keyword);
        // variabel diatas ini nanti dikali 1000 karena data tersimpan di database nya adalah dikali 1000 juga
        // dengan tujuan biar bisa menyimpan satuan yang lebih kecil dari seribu rupiah

        $keyword_to_lowercase = strtolower($keyword);
        // "terbeli" == $keyword_to_lowercase ? $keyword_sudahdibeli = "1" : $keyword_sudahdibeli = "0";

        if ($keyword_to_lowercase == "terbeli") {
            $keyword_sudahdibeli = "1";
            d($keyword_sudahdibeli);
            return $this->where('habis_sudahdibeli', $keyword_sudahdibeli)->findAll();
        } elseif ($keyword_to_lowercase == "belum dibeli") {
            $keyword_sudahdibeli = "0";
            d($keyword_sudahdibeli);
            return $this->where('habis_sudahdibeli', $keyword_sudahdibeli)->findAll();
        } else {
            // return $this->like('hutang_nama', $keyword)->orLike('hutang_alamat', $keyword)->orLike('hutang_telp', $keyword)->orWhere('hutang_nominal', ($keyword_to_int * 1000))->orLike('hutang_catatan', $keyword)->orWhere('hutang_id', $keyword)->findAll();

            return $this->like('habis_namabarang', $keyword)->orLike('habis_catatan', $keyword)->findAll();
        }

        // return $this->like('habis_namabarang', $keyword)->orWhere('habis_sudahdibeli', $keyword_sudahdibeli)->orLike('habis_catatan', $keyword)->findAll();

        // return $this->like('hutang_nama', $keyword)->orLike('hutang_alamat', $keyword)->orLike('hutang_telp', $keyword)->orWhere('hutang_nominal', ($keyword_to_int * 1000))->orLike('hutang_catatan', $keyword)->orWhere('hutang_islunas', $keyword_sudahdibeli)->orWhere('hutang_id', $keyword)->findAll();
    }

    public function fiturCariWaktu($input_date_begin, $input_date_end)
    {

        // dd($input_date_begin);
        // kode dibawah WORKS!!!!
        return $this->where("habis_date >=", $input_date_begin)->where("habis_date <=", $input_date_end)->findAll();
    }
}
