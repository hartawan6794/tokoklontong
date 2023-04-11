<?php

namespace App\Controllers;

use App\Models\HutangPelangganModel;

class SupplierContact extends BaseController
{
    protected $SupplierContactModel;

    public function __construct()
    {
        $this->SupplierContactModel = new \App\Models\SupplierContactModel();
    }


    public function index()
    {
        // d($this->request->getVar('keyword'));
        // getVar ini bisa ngambil GET bisa ngambil POST

        // ////////////////////////
        // $temp = $this->SupplierContactModel->where('supp_nama', "john");
        // $temp = $this->SupplierContactModel->getSupplier(4);
        // $temp2 = $temp['supp_nama'];
        // dd($temp2);

        $keyword = $this->request->getVar('keyword');
        $input_date_begin = $this->request->getVar('input-date-begin');
        $input_date_end = $this->request->getVar('input-date-end');

        // $keyword = $this->request->getGet('keyword');
        if ($keyword) {
            // d("masuk if ");
            $pencarian = $this->SupplierContactModel->fiturCari($keyword);
            // dd("masuk sini");
        } else if ($input_date_begin && $input_date_end) {
            $pencarian = $this->SupplierContactModel->fiturCariWaktu($input_date_begin, $input_date_end);
        } else {
            $pencarian = $this->SupplierContactModel->getSupplier();
            // d("masuk else ");
        }

        $data = [
            'title' => 'Supplier Contact',
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

        return view('supplier_contact/index', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Tambah Supplier Contact',
            'validation' => \config\Services::validation()
        ];
        return view('supplier_contact/create', $data);
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
                'supp_nama' =>
                [
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => '{field} harus diisi.',
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'supp_jenisproduk' =>
                [
                    'rules' => 'max_length[255]',
                    'errors' => [
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'supp_namaproduk' =>
                [
                    'rules' => 'max_length[255]',
                    'errors' => [
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'supp_catatanproduk' =>
                [
                    'rules' => 'max_length[255]',
                    'errors' => [
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'supp_nomorwa' =>
                [
                    'rules' => 'max_length[15]',
                    'errors' => [
                        'max_length' => '{field} maksimal 15 karakter',
                    ]
                ],
                'supp_telp1' =>
                [
                    'rules' => 'max_length[15]',
                    'errors' => [
                        'max_length' => '{field} maksimal 15 karakter',
                    ]
                ],
                'supp_telp2' =>
                [
                    'rules' => 'max_length[15]',
                    'errors' => [
                        'max_length' => '{field} maksimal 15 karakter',
                    ]
                ],
                'supp_catatantambahan' =>
                [
                    'rules' => 'max_length[255]',
                    'errors' => [
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'supp_alamat' =>
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

            return redirect()->to('supplier_contact/create')->withInput()->with('validation', $validation);

            // diatas ini, input dari withInput() akan kesimpan di session, maka session 
            // harus dinyalakan biar berfungsi
        };

        $this->SupplierContactModel->save([
            'supp_nama' => $this->request->getVar('supp_nama'),
            'supp_jenisproduk' => $this->request->getVar('supp_jenisproduk'),
            'supp_namaproduk' => $this->request->getVar('supp_namaproduk'),
            'supp_catatanproduk' => $this->request->getVar('supp_catatanproduk'),
            'supp_nomorwa' => $this->request->getVar('supp_nomorwa'),
            'supp_telp1' => $this->request->getVar('supp_telp1'),
            'supp_telp2' => $this->request->getVar('supp_telp2'),
            'supp_catatantambahan' => $this->request->getVar('supp_catatantambahan'),
            'supp_alamat' => $this->request->getVar('supp_alamat'),
        ]);


        // dibawah ini untuk menggunakan flashdata, yaitu sebuah data yang hanya muncul sekali aja. 
        // jadi klo halaman di refresh, hilang data nya. pake session

        session()->setFlashdata('pesan', 'Supplier Contact Berhasil Ditambahkan');
        return redirect()->to('supplier_contact');
    }

    public function delete($supp_id)
    {
        // method delete ini udah bawaan dari model kalo pake CI, sama seperti save
        // dd($slug);

        // public function delete($slug)
        // $this->komikModel->where('slug', $slug)->delete();
        // cara diatas ini bisa  dipake kalau misal nyari data yg mau dihapus itu gapake primary key
        // (disini dia pake kolom slug buat nyari datanya)


        // $this->UserModel->delete($id);
        // $this->UserModel->delete(['user_id' => $id]);
        $this->SupplierContactModel->where('supp_id', $supp_id)->delete();
        // cara diatas ini HANYA bisa dipake kalo pencarian data yang mau dihapus menggunakan primary key
        // kalo misal menggunakan $this->komikModel->delete($slug); gaakan bisa, udah tak coba sendiri.
        // sumber nya ada di dokumentasi codeigniter

        session()->setFlashdata('pesan', 'Supplier Contact Berhasil Dihapus');
        return redirect()->to('supplier_contact');
    }

    public function edit($supp_id)
    {
        // SESSION DIBAWAH INI HARUS NYALA UNTUK MENGAMBIL VALIDATION  DAN DATAUSERDIEDIT!!!!
        // HABIS 4 JAM CUMA KARENA BINGUNG SESSION DIBAWAH INI MATI, jadinya gabisa akses datauserdiedit
        // FAKKK

        // BASE CONTROLLER DIMASUKKIN DI BASE CONTROLLER BIAR JALAN DARI AWALLL!!!!!!

        // session();
        $data = [
            'title' => 'Edit Supplier Contact',
            'validation' => \config\Services::validation(),
            'dataSupplierContactDiedit' => $this->SupplierContactModel->getSupplier($supp_id)
        ];
        return view('supplier_contact/edit', $data);
    }

    // public function update()

    // dibawah ini bisa
    // harusnya gapake parameter $id itu bisa kok, tapi masalahnya kan nanti 
    // semua value2 kalo diedit bakal berubah
    public function update($supp_id)
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
                'supp_nama' =>
                [
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => '{field} harus diisi.',
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'supp_jenisproduk' =>
                [
                    'rules' => 'max_length[255]',
                    'errors' => [
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'supp_namaproduk' =>
                [
                    'rules' => 'max_length[255]',
                    'errors' => [
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'supp_catatanproduk' =>
                [
                    'rules' => 'max_length[255]',
                    'errors' => [
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'supp_nomorwa' =>
                [
                    'rules' => 'max_length[15]',
                    'errors' => [
                        'max_length' => '{field} maksimal 15 karakter',
                    ]
                ],
                'supp_telp1' =>
                [
                    'rules' => 'max_length[15]',
                    'errors' => [
                        'max_length' => '{field} maksimal 15 karakter',
                    ]
                ],
                'supp_telp2' =>
                [
                    'rules' => 'max_length[15]',
                    'errors' => [
                        'max_length' => '{field} maksimal 15 karakter',
                    ]
                ],
                'supp_catatantambahan' =>
                [
                    'rules' => 'max_length[255]',
                    'errors' => [
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'supp_alamat' =>
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
            return redirect()->to('/supplier_contact/edit/' . $supp_id)->withInput()->with('validation', $validation);


            // return redirect()->to('/admin/edit/')->withInput()->with('validation', $validation);
        };



        // dibawah ini bisa
        // $slug = url_title($this->request->getVar('judul'), '-', true);

        $dataUpdate = [
            'supp_nama' => $this->request->getVar('supp_nama'),
            'supp_jenisproduk' => $this->request->getVar('supp_jenisproduk'),
            'supp_namaproduk' => $this->request->getVar('supp_namaproduk'),
            'supp_catatanproduk' => $this->request->getVar('supp_catatanproduk'),
            'supp_nomorwa' => $this->request->getVar('supp_nomorwa'),
            'supp_telp1' => $this->request->getVar('supp_telp1'),
            'supp_telp2' => $this->request->getVar('supp_telp2'),
            'supp_catatantambahan' => $this->request->getVar('supp_catatantambahan'),
            'supp_alamat' => $this->request->getVar('supp_alamat'),
        ];

        // $this->komikModel->whereIn('slug', $slug)->set($dataUpdate)->update();
        // $this->komikModel->whereIn('id', [$id])->set($dataUpdate)->update();
        // $this->komikModel->whereIn('slug', [$slug])->set($dataUpdate)->update();
        // $this->komikModel->whereIn('id', [$beta])->set($dataUpdate)->update();

        // dibawah ini bisa, ini nyari sendiri gak ngikutin dari video hehe
        $this->SupplierContactModel->whereIn('supp_id', [$supp_id])->set($dataUpdate)->update();




        session()->setFlashdata('pesan', 'Supplier Contact Berhasil diubah');

        return redirect()->to('supplier_contact/');
    }

    public function autocompletesupp()
    {
        // dd("tes");

        // dibawah ini bisa
        $pencarian = $this->SupplierContactModel->getSupplierName();

        // $data = [
        //     'title' => 'Supplier Contact',

        //     'data_row' => $pencarian,
        // ];


        // return view('supplier_contact/index', $data);

        // dibawah ini bisa
        echo json_encode($pencarian);
        // dd(12);

        // return $this->response->setJSON($pencarian);
        // echo $pencarian;
        // return $pencarian;


        // $temp = $pencarian;
        // foreach ($temp as $nama) {
        // $return_arr[] = $nama->nama_buku;
        // }

        // dd($return_arr);

        // echo json_encode($return_arr);
    }

    // public function autocompletesupp()
    // {
    //     $searchTerm = $this->request->getVar('term');
    //     $pencarian = $this->SupplierContactModel->getSupplierName($searchTerm);

    //     return $this->response->setJSON($pencarian);
    // }

    public function tampilview()
    {
        $data = [
            'title' => 'Supplier Contact',

            // 'data_row' => $pencarian,
        ];
        // dd(23);
        // return view('coba_autocomplete/autocomplete', $data);
        return view('coba_autocomplete/cgpt3_autocomplete', $data);
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
