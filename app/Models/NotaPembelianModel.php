<?php

namespace App\Models;

use CodeIgniter\Model;

use function PHPUnit\Framework\isNull;

class NotaPembelianModel extends Model
{
    protected $table = 'nota_pembelian';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;


    // protected $returnType = "table";

    // dibawah ini untuk mengijinkan jika field2 tersebut akan diisi manual oleh kita
    // protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul'];
    protected $allowedFields = ['nota_date', 'nota_tempatbeli', 'nota_catatan',];
    // protected $primaryKey = 'id';



    public function getNota($nota_id = false)
    {

        if ($nota_id == false) {
            // return $this->findAll();

            // DIBAWAH INI ADALAH PENULISAN YanG BISA DISINGKAT DENGAN LANGSUNG DI CHAINING dengan $this
            // $builder = $this->table('komik');
            // $builder->like('judul', 'naruto');
            // return $builder;

            // return $this->findAll();
            // return $this->orderBy('id', 'desc')->findAll();

            // $temp = $this->orderBy('nota_date', 'desc')->first();
            // dd($temp["nota_id"]);

            // return $this->orderBy('nota_date', 'desc')->first();

            // dd($this->orderBy('nota_date', 'desc')->findAll());

            return $this->orderBy('nota_date', 'desc')->findAll();
        } else {
            // ini untuk melanjutkan proses penampilan detail komik yang dipilih
            // return $this->where(['slug' => $keyword])->first();

            return $this->where(['nota_id' => $nota_id])->first();
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

        return $this->like('nota_catatan', $keyword)->orLike('nota_tempatbeli', $keyword)->findAll();

        // return $this->like('hutang_nama', $keyword)->orLike('hutang_alamat', $keyword)->orLike('hutang_telp', $keyword)->orWhere('hutang_nominal', ($keyword_to_int * 1000))->orLike('hutang_catatan', $keyword)->orWhere('hutang_islunas', $keyword_islunas)->orWhere('hutang_id', $keyword)->findAll();
    }

    public function fiturCariWaktu($input_date_begin, $input_date_end)
    {

        // dd($input_date_begin);
        // kode dibawah WORKS!!!!
        return $this->where("nota_date >=", $input_date_begin)->where("nota_date <=", $input_date_end)->findAll();
    }
}
