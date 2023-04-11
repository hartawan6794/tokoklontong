<?php

namespace App\Controllers;

use App\Models\OmzetHarianModel;

class OmzetHarian extends BaseController
{
    protected $OmzetHarianModel;

    public function __construct()
    {
        $this->OmzetHarianModel = new \App\Models\OmzetHarianModel();
    }


    public function index()
    {
        // d($this->request->getVar('keyword'));
        // getVar ini bisa ngambil GET bisa ngambil POST


        // $temp = "2022-10-01";
        // $temp = "2023-02-09";

        // $temp2 = $this->OmzetHarianModel->fiturCariWaktu($temp, $temp);

        // // dd($temp2);
        // if ($temp2) {
        //     dd("masuk 1");
        // } else {
        //     dd("false");
        // }


        $keyword = $this->request->getVar('keyword');
        $input_date_begin = $this->request->getVar('input-date-begin');
        $input_date_end = $this->request->getVar('input-date-end');

        // $keyword = $this->request->getGet('keyword');
        if ($keyword) {
            d("masuk if ");
            $pencarian = $this->OmzetHarianModel->fiturCari($keyword);
            // dd("masuk sini");
        } else if ($input_date_begin && $input_date_end) {
            d("masuk elseif ");
            $pencarian = $this->OmzetHarianModel->fiturCariWaktu($input_date_begin, $input_date_end);
        } else {
            $pencarian = $this->OmzetHarianModel->getOmzet();
            d("masuk else ");
        }

        $data = [
            'title' => 'Omzet Harian',
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

        return view('omzet_harian/index', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Tambah Omzet Harian',
            'validation' => \config\Services::validation()
        ];
        return view('omzet_harian/create', $data);
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
                'input_omzet_date' =>
                [
                    'rules' => 'required|is_unique[omzet_harian.omzet_date]',
                    'errors' => [
                        'required' => '{field} harus diisi.',
                        'is_unique' => '{field} sudah terdaftar',
                    ]
                ],
                'omzet_catatan' =>
                [
                    'rules' => 'max_length[255]',
                    'errors' => [
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'omzet_nominal' =>
                [
                    'rules' => 'required|max_length[20]',
                    'errors' => [
                        'required' => '{field} harus diisi.',
                        'max_length' => '{field} maksimal 20 karakter',
                    ]
                ],

            ]
        )) {
            $validation = \config\Services::validation();
            // dd($validation);
            // return redirect()->to('/komik/create');

            return redirect()->to('omzet_harian/create')->withInput()->with('validation', $validation);

            // diatas ini, input dari withInput() akan kesimpan di session, maka session 
            // harus dinyalakan biar berfungsi
        };

        // 'omzet_nominal' => ((int)($this->request->getVar('omzet_nominal')) * 1000),
        // d((($this->request->getVar('omzet_nominal'))));
        // d((($this->request->getVar('omzet_nominal')) * 1000));
        // d((floatval($this->request->getVar('omzet_nominal'))));
        // d(((int)($this->request->getVar('omzet_nominal'))));
        // d(((int)($this->request->getVar('omzet_nominal'))) * 1000);
        // dd((($this->request->getVar('omzet_nominal'))) * 1000);

        // dd($this->request->getVar('input_omzet_date'));
        // $this->request->getVar(...) string (10) "2023-02-09"

        $this->OmzetHarianModel->save([
            'omzet_date' => $this->request->getVar('input_omzet_date'),
            'omzet_nominal' => (($this->request->getVar('omzet_nominal')) * 1000),
            'omzet_catatan' => $this->request->getVar('omzet_catatan'),
        ]);


        // dibawah ini untuk menggunakan flashdata, yaitu sebuah data yang hanya muncul sekali aja. 
        // jadi klo halaman di refresh, hilang data nya. pake session

        session()->setFlashdata('pesan', 'Omzet Harian Berhasil Ditambahkan');
        return redirect()->to('omzet_harian');
    }

    public function delete($omzet_id)
    {
        // method delete ini udah bawaan dari model kalo pake CI, sama seperti save
        // dd($slug);

        // public function delete($slug)
        // $this->komikModel->where('slug', $slug)->delete();
        // cara diatas ini bisa  dipake kalau misal nyari data yg mau dihapus itu gapake primary key
        // (disini dia pake kolom slug buat nyari datanya)


        // $this->UserModel->delete($id);
        // $this->UserModel->delete(['user_id' => $id]);
        $this->OmzetHarianModel->where('omzet_id', $omzet_id)->delete();
        // cara diatas ini HANYA bisa dipake kalo pencarian data yang mau dihapus menggunakan primary key
        // kalo misal menggunakan $this->komikModel->delete($slug); gaakan bisa, udah tak coba sendiri.
        // sumber nya ada di dokumentasi codeigniter

        session()->setFlashdata('pesan', 'Omzet Berhasil Dihapus');
        return redirect()->to('omzet_harian');
    }

    public function edit($omzet_id)
    {
        // SESSION DIBAWAH INI HARUS NYALA UNTUK MENGAMBIL VALIDATION  DAN DATAUSERDIEDIT!!!!
        // HABIS 4 JAM CUMA KARENA BINGUNG SESSION DIBAWAH INI MATI, jadinya gabisa akses datauserdiedit
        // FAKKK

        // BASE CONTROLLER DIMASUKKIN DI BASE CONTROLLER BIAR JALAN DARI AWALLL!!!!!!

        // session();
        $data = [
            'title' => 'Edit Omzet Harian',
            'validation' => \config\Services::validation(),
            'dataOmzetHarianDiedit' => $this->OmzetHarianModel->getOmzet($omzet_id)
        ];
        return view('omzet_harian/edit', $data);
    }

    // public function update()

    // dibawah ini bisa
    // harusnya gapake parameter $id itu bisa kok, tapi masalahnya kan nanti 
    // semua value2 kalo diedit bakal berubah
    public function update($omzet_id)
    {
        // session();
        // cek judul
        $omzetLama = $this->OmzetHarianModel->whereIn('omzet_id', [$omzet_id])->first();
        // $usernameLama = $this->UserModel->getUser($this->request->getVar('username'));

        // dd($this->request->getVar('slug'));
        // dd($this->request->getVar('username'));
        // dd($usernameLama);
        // dd($usernameLama['user_name']);
        if ($omzetLama['omzet_date'] == $this->request->getVar('input_omzet_date')) {
            // dd("masuk if");
            $rule_omzet_date = 'required';
        }
        // else if(strlen($this->request->getVar('username')) > 20){

        // } 
        else {
            // dd("masuk else");
            $rule_omzet_date = 'required|is_unique[omzet_harian.omzet_date]';
        }



        // ini diambil dari method save

        // validasi input
        if (!$this->validate(
            [
                // 'judul' => 'required|is_unique[komik.judul]'
                'input_omzet_date' =>
                [
                    'rules' => $rule_omzet_date,
                    'errors' => [
                        'required' => '{field} harus diisi.',
                        'is_unique' => '{field} sudah terdaftar',
                    ]
                ],
                'omzet_catatan' =>
                [
                    'rules' => 'max_length[255]',
                    'errors' => [
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'omzet_nominal' =>
                [
                    'rules' => 'required|max_length[20]',
                    'errors' => [
                        'required' => '{field} harus diisi.',
                        'max_length' => '{field} maksimal 20 karakter',
                    ]
                ],

            ]
        )) {
            $validation = \config\Services::validation();
            // dd($validation);
            // dd($rule_username);
            // dd("apakah masuk sini?");
            // return redirect()->to('/admin/edit/' . $this->request->getVar('username'))->withInput()->with('validation', $validation);
            return redirect()->to('/omzet_harian/edit/' . $omzet_id)->withInput()->with('validation', $validation);


            // return redirect()->to('/admin/edit/')->withInput()->with('validation', $validation);
        };



        // dibawah ini bisa
        // $slug = url_title($this->request->getVar('judul'), '-', true);

        $dataUpdate = [
            'omzet_date' => $this->request->getVar('input_omzet_date'),
            'omzet_nominal' => (($this->request->getVar('omzet_nominal')) * 1000),
            'omzet_catatan' => $this->request->getVar('omzet_catatan'),
        ];

        // $this->komikModel->whereIn('slug', $slug)->set($dataUpdate)->update();
        // $this->komikModel->whereIn('id', [$id])->set($dataUpdate)->update();
        // $this->komikModel->whereIn('slug', [$slug])->set($dataUpdate)->update();
        // $this->komikModel->whereIn('id', [$beta])->set($dataUpdate)->update();

        // dibawah ini bisa, ini nyari sendiri gak ngikutin dari video hehe
        $this->OmzetHarianModel->whereIn('omzet_id', [$omzet_id])->set($dataUpdate)->update();




        session()->setFlashdata('pesan', 'Data Omzet Berhasil diubah');

        return redirect()->to('omzet_harian/');
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
