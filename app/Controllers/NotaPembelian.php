<?php

namespace App\Controllers;

use App\Models\HutangPelangganModel;

class NotaPembelian extends BaseController
{
    protected $NotaPembelianModel;
    protected $ItemNotaPembelianModel;

    public function __construct()
    {
        $this->NotaPembelianModel = new \App\Models\NotaPembelianModel();
        $this->ItemNotaPembelianModel = new \App\Models\ItemNotaPembelianModel();
    }


    public function index()
    {
        // d($this->request->getVar('keyword'));
        // getVar ini bisa ngambil GET bisa ngambil POST

        $keyword = $this->request->getVar('keyword');
        $input_date_begin = $this->request->getVar('input-date-begin');
        $input_date_end = $this->request->getVar('input-date-end');

        // $keyword = $this->request->getGet('keyword');
        if ($keyword) {
            // d("masuk if ");
            $pencarian = $this->NotaPembelianModel->fiturCari($keyword);
            // dd("masuk sini");
        } else if ($input_date_begin && $input_date_end) {
            $pencarian = $this->NotaPembelianModel->fiturCariWaktu($input_date_begin, $input_date_end);
        } else {
            $pencarian = $this->NotaPembelianModel->getNota();
            // d("masuk else ");
        }

        $data = [
            'title' => 'Nota Pembelian',
            // 'komik' => $komik

            // dibawah ini untuk menampilkan tanpa pagination, manggil method findall di controller
            // komikmodel yang udah dibuat
            // methond findAll() itu ternyata sudah ada sendiri milik dari class Model, sehingga
            // gaperlu dibuat lagi di controller. tinggal pake
            // 'komik' => $this->komikModel->getKomik()

            // paginate() juga adalah method yang udah ada milik dari class model, sama kek findAll();
            // pager juga udah ada
            // dibawha ini untuk menampilkan dengan pagination dan pager yang ada di paling bawah untuk
            // ganti2 halaman

            // 'komik' => $this->komikModel->paginate(3), jumlah item per halaman adalah 3
            // 'komik' => $this->komikModel->paginate(3, asd), asd adalah nama tabelnya 

            // 'komik' => $this->komikModel->getKomik(),
            // dd($pencarian),
            'data_row' => $pencarian,
            // dd("masuk sini");

            // 'komik' => $this->komikModel->paginate(3, 'komik'),
            // 'pager' => $this->komikModel->pager
        ];

        // ---dibawah ini adalah connect ke tabel db tapi tanpa model
        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * FROM komik");
        // foreach ($komik->getResultArray() as $row) {
        //     d($row);
        // }

        // ---dibawah ini adalah instansiasi kelas model, tapi gak dipake
        // $komikModel = new \App\Models\KomikModel();

        // $komikModel = new KomikModel();
        d($pencarian);

        return view('nota_pembelian/index', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Tambah Nota Pembelian',
            'validation' => \config\Services::validation()
        ];
        return view('nota_pembelian/create', $data);
    }

    public function save()
    {
        // dd($this->request->getVar('user_isowner'));
        // dd($this->request->getVar());

        // dd($this->request->getVar('judul'));
        // bisa mengambil request apapun entah itu POST atau GET
        // getPost() apabila ingin mengambil POST, dst

        // validasi input

        if (!$this->validate(
            [
                // 'judul' => 'required|is_unique[komik.judul]'
                'input_nota_date' =>
                [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.',
                    ]
                ],
                'nota_tempatbeli' =>
                [
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'nota_catatan' =>
                [
                    'rules' => 'max_length[255]',
                    'errors' => [
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
            ]
        )) {
            $validation = \config\Services::validation();
            // dd($validation);
            // return redirect()->to('/komik/create');

            return redirect()->to('nota_pembelian/create')->withInput()->with('validation', $validation);

            // diatas ini, input dari withInput() akan kesimpan di session, maka session 
            // harus dinyalakan biar berfungsi
        };


        $this->NotaPembelianModel->save([
            'nota_date' => $this->request->getVar('input_nota_date'),
            'nota_tempatbeli' => $this->request->getVar('nota_tempatbeli'),
            'nota_catatan' => $this->request->getVar('nota_catatan'),
        ]);


        // dibawah ini untuk menggunakan flashdata, yaitu sebuah data yang hanya muncul sekali aja. 
        // jadi klo halaman di refresh, hilang data nya. pake session

        session()->setFlashdata('pesan', 'Nota Pembelian Berhasil Ditambahkan');

        // ini sebelum dirubah, masuk ke index nota_pembelian
        // return redirect()->to('nota_pembelian');

        // dibawah ini setelah bikin baru, langsung masuk ke daftar item di nota baru tsb
        $temp = $this->NotaPembelianModel->orderBy('nota_id', 'desc')->first();
        $temp2 = $temp["nota_id"];

        return redirect()->to("/item_notapembelian/" . $temp2);
    }

    public function delete($nota_id)
    {
        $this->NotaPembelianModel->where('nota_id', $nota_id)->delete();

        // dibawah ini memanggil Model ItemNotaPembelian Model
        $this->ItemNotaPembelianModel->where('itemnota_notaid', $nota_id);

        session()->setFlashdata('pesan', 'Nota Pembelian Berhasil Dihapus');
        return redirect()->to('nota_pembelian');
    }

    public function edit($nota_id)
    {
        // SESSION DIBAWAH INI HARUS NYALA UNTUK MENGAMBIL VALIDATION  DAN DATAUSERDIEDIT!!!!
        // HABIS 4 JAM CUMA KARENA BINGUNG SESSION DIBAWAH INI MATI, jadinya gabisa akses datauserdiedit
        // FAKKK

        // BASE CONTROLLER DIMASUKKIN DI BASE CONTROLLER BIAR JALAN DARI AWALLL!!!!!!

        // session();
        $data = [
            'title' => 'Edit Nota Pembelian',
            'validation' => \config\Services::validation(),
            'dataNotaPembelianDiedit' => $this->NotaPembelianModel->getNota($nota_id)
        ];
        return view('nota_pembelian/edit', $data);
    }

    // public function update()

    // dibawah ini bisa
    // harusnya gapake parameter $id itu bisa kok, tapi masalahnya kan nanti 
    // semua value2 kalo diedit bakal berubah
    public function update($nota_id)
    {
        // session();
        // cek judul
        // $usernameLama = $this->UserModel->getUser($this->request->getVar('username'));

        // dd($this->request->getVar('slug'));
        // dd($this->request->getVar('username'));
        // dd($usernameLama);
        // dd($usernameLama['user_name']);


        // ini diambil dari method save

        // validasi input


        if (!$this->validate(
            [
                // 'judul' => 'required|is_unique[komik.judul]'
                'input_nota_date' =>
                [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.',
                    ]
                ],
                'nota_tempatbeli' =>
                [
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'nota_catatan' =>
                [
                    'rules' => 'max_length[255]',
                    'errors' => [
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
            ]
        )) {
            $validation = \config\Services::validation();
            // dd($validation);
            // dd($rule_username);
            // dd("apakah masuk sini?");
            // return redirect()->to('/admin/edit/' . $this->request->getVar('username'))->withInput()->with('validation', $validation);
            return redirect()->to('/nota_pembelian/edit/' . $nota_id)->withInput()->with('validation', $validation);


            // return redirect()->to('/admin/edit/')->withInput()->with('validation', $validation);
        };



        // dibawah ini bisa
        // $slug = url_title($this->request->getVar('judul'), '-', true);

        $dataUpdate = [
            'nota_date' => $this->request->getVar('input_nota_date'),
            'nota_tempatbeli' => $this->request->getVar('nota_tempatbeli'),
            'nota_catatan' => $this->request->getVar('nota_catatan'),
        ];

        // $this->komikModel->whereIn('slug', $slug)->set($dataUpdate)->update();
        // $this->komikModel->whereIn('id', [$id])->set($dataUpdate)->update();
        // $this->komikModel->whereIn('slug', [$slug])->set($dataUpdate)->update();
        // $this->komikModel->whereIn('id', [$beta])->set($dataUpdate)->update();

        // dibawah ini bisa, ini nyari sendiri gak ngikutin dari video hehe
        $this->NotaPembelianModel->whereIn('nota_id', [$nota_id])->set($dataUpdate)->update();




        session()->setFlashdata('pesan', 'Data Nota Pembelian Berhasil diubah');

        return redirect()->to('nota_pembelian/');
    }

    // public function pencarian()
    // {
    //     // dd($this->komikModel->whereIn('judul', [$keyword])->findAll());
    //     // dd($this->request->getVar('keyword'));

    //     $keyword = $this->request->getVar('keyword');

    //     // code bawah ini bisa, jika keyword yang dimasukkan adalah SLUG yang ADA didalam tabel tsb
    //     // karena kode ini akan manggil method detail dengan inputan dari $keyword sebagai $slug sesuai pada 
    //     // method detail($slug)
    //     // return $this->detail($keyword);

    //     // dibawah ini bisa, menghasilkan array 1 row sesuai pencarian. mahookkk
    //     // wherein ini mencari yang tulisannya sesuai. 
    //     // data "diskotik bersama" dicari "diskotik" = ga ketemu 
    //     // data "diskotik bersama" dicari "diskotik bersama" = ketemu 
    //     // data "diskotik bersama" dicari "DISKOTIK BeRSama" = ketemu 
    //     // return $this->komikModel->whereIn('judul', [$keyword])->findAll();

    //     // dibawah ini bisa
    //     // $bersama = url_title($this->request->getVar('keyword'), '-', true);
    //     // return $this->detail($bersama);
    //     // dd($this->komikModel->whereIn('judul', [$keyword])->findAll());


    //     // kalo pake query builder, HRUS DIKASIH TAU dulu tabel nya apa (dari vid galih sandhika)
    //     // builder ini ada di model

    //     dd($this->komikModel->fiturCari($keyword));
    //     // dd($this->komikModel->like('judul', $keyword));
    //     // $builder = $this->komikModel->table('komik')->like('judul', $keyword);
    //     // dd($builder);
    //     // return $this->komikModel->like('judul', $keyword);
    //     // return $this->detail();
    // }
}
