<?php

namespace App\Models;

use CodeIgniter\Model;

use function PHPUnit\Framework\isNull;

class NotaPelangganModel extends Model
{
    protected $table = 'nota_pelanggan';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;

    // dibawah ini untuk mengijinkan jika field2 tersebut akan diisi manual oleh kita
    // protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul'];
    protected $allowedFields = [
        'notapel_date',
        'notapel_namapelanggan',
        'notapel_ismain',
        'notapel_catatan',
        'notapel_grandtotal',
        'subnotapel_idstokbarang',
        'subnotapel_namabarang',
        'subnotapel_jumlahpembelian',
        'subnotapel_notapelid',
        'subnotapel_totalharga',
    ];
    // protected $primaryKey = 'id';



    public function getNotaPelanggan($notapel_id = false)
    {

        if ($notapel_id == false) {
            return $this->where('notapel_ismain', 1)->findAll();
            // DIBAWAH INI ADALAH PENULISAN YanG BISA DISINGKAT DENGAN LANGSUNG DI CHAINING dengan $this
            // $builder = $this->table('komik');
            // $builder->like('judul', 'naruto');
            // return $builder;

            // return $this->orderBy('id', 'desc')->findAll();
        } else {
            // ini untuk melanjutkan proses penampilan detail komik yang dipilih
            // return $this->where(['slug' => $keyword])->first();

            return $this->where(['notapel_id' => $notapel_id, 'notapel_ismain' => 1])->first();
        }
    }

    public function getSubNotapel($subnotapel_notapelid)
    {

        // d($itemnota_id);
        // if ($itemnota_id == false) {

        //     d("masuk if di model");
        //     return $this->where('itemnota_notaid', $itemnota_notaid)->findAll();
        //     // DIBAWAH INI ADALAH PENULISAN YanG BISA DISINGKAT DENGAN LANGSUNG DI CHAINING dengan $this
        //     // $builder = $this->table('komik');
        //     // $builder->like('judul', 'naruto');
        //     // return $builder;

        //     // return $this->orderBy('id', 'desc')->findAll();
        // } else {
        //     // ini untuk melanjutkan proses penampilan detail komik yang dipilih
        //     // return $this->where(['slug' => $keyword])->first();

        //     // d($itemnota_id);
        //     d("masuk else di model");

        //     // dd("masuk else di model");
        //     // dd($this->where('itemnota_notaid', $itemnota_notaid)->findAll());

        //     // dd($this->where('itemnota_notaid', $itemnota_notaid)->orWhere('itemnota_id', $itemnota_id)->findAll());

        //     // dd($this->where('itemnota_notaid', $itemnota_notaid)->where('itemnota_id', $itemnota_id)->first());
        //     // return $this->where('itemnota_notaid', $itemnota_notaid)->orWhere('itemnota_id', $itemnota_id)->findAll();

        //     return $this->where(['itemnota_id' => $itemnota_id, 'itemnota_notaid' => $itemnota_notaid])->first();
        // }

        d("masuk else di model");

        return $this->where([
            'subnotapel_notapelid' => $subnotapel_notapelid,
            'notapel_ismain' => 0,
        ])->findAll();
    }


    public function fiturCari($keyword)
    {
        // return $this->like('stok_id', $keyword)->orLike('stok_jumlah', $keyword)->orLike('stok_namabarang', $keyword)->orLike('stok_satuan', $keyword)->orLike('stok_harga', $keyword)->orLike('stok_deskripsi', $keyword)->findAll();

        return $this->like('notapel_namapelanggan', $keyword)->orLike('notapel_grandtotal', $keyword)->orLike('notapel_catatan', $keyword)->findAll();
    }

    public function fiturCariWaktu($input_date_begin, $input_date_end)
    {

        return $this->where("notapel_date >=", $input_date_begin)->where("notapel_date <=", $input_date_end)->findAll();
    }
}
