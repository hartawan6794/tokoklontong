<?php

namespace App\Controllers;

use App\Models\StokBarangModel;

class StokBarang extends BaseController
{
    protected $StokBarangModel;

    public function __construct()
    {
        $this->StokBarangModel = new \App\Models\StokBarangModel();
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
            $pencarian = $this->StokBarangModel->fiturCari($keyword);
            // dd("masuk sini");
        } else if ($input_date_begin && $input_date_end) {
            $pencarian = $this->ItemNotaPembelianModel->fiturCariWaktu($input_date_begin, $input_date_end);
        } else {
            $pencarian = $this->StokBarangModel->getStokBarang();
            // d("masuk else ");
        }

        $data = [
            'title' => 'Stok Barang',
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

        return view('stok_barang/index', $data);
    }

    // public function detail_nota_item($itemnota_notaid)
    // {
    //     // d($this->request->getVar('keyword'));
    //     // getVar ini bisa ngambil GET bisa ngambil POST

    //     $keyword = $this->request->getVar('keyword');
    //     $input_date_begin = $this->request->getVar('input-date-begin');
    //     $input_date_end = $this->request->getVar('input-date-end');

    //     // $keyword = $this->request->getGet('keyword');
    //     if ($keyword) {
    //         // d("masuk if ");
    //         $pencarian = $this->ItemNotaPembelianModel->fiturCariDetail($keyword, $itemnota_notaid);
    //         // dd("masuk sini");
    //     } else if ($input_date_begin && $input_date_end) {
    //         $pencarian = $this->ItemNotaPembelianModel->fiturCariWaktuDetail($input_date_begin, $input_date_end, $itemnota_notaid);
    //     } else {
    //         $pencarian = $this->ItemNotaPembelianModel->getItemNotaDetail(false, $itemnota_notaid);
    //         // d("masuk else ");
    //     }

    //     $data = [
    //         'title' => 'Detail Item Nota Pembelian',
    //         // 'komik' => $komik

    //         // dibawah ini untuk menampilkan tanpa pagination, manggil method findall di controller
    //         // komikmodel yang udah dibuat
    //         // methond findAll() itu ternyata sudah ada sendiri milik dari class Model, sehingga
    //         // gaperlu dibuat lagi di controller. tinggal pake
    //         // 'komik' => $this->komikModel->getKomik()

    //         // paginate() juga adalah method yang udah ada milik dari class model, sama kek findAll();
    //         // pager juga udah ada
    //         // dibawha ini untuk menampilkan dengan pagination dan pager yang ada di paling bawah untuk
    //         // ganti2 halaman

    //         // 'komik' => $this->komikModel->paginate(3), jumlah item per halaman adalah 3
    //         // 'komik' => $this->komikModel->paginate(3, asd), asd adalah nama tabelnya 

    //         // 'komik' => $this->komikModel->getKomik(),
    //         // dd($pencarian),
    //         'data_row' => $pencarian,

    //         'data_itemnota_notaid' => $itemnota_notaid,

    //         // dd("masuk sini");

    //         // 'komik' => $this->komikModel->paginate(3, 'komik'),
    //         // 'pager' => $this->komikModel->pager
    //     ];

    //     // ---dibawah ini adalah connect ke tabel db tapi tanpa model
    //     // $db = \Config\Database::connect();
    //     // $komik = $db->query("SELECT * FROM komik");
    //     // foreach ($komik->getResultArray() as $row) {
    //     //     d($row);
    //     // }

    //     // ---dibawah ini adalah instansiasi kelas model, tapi gak dipake
    //     // $komikModel = new \App\Models\KomikModel();

    //     // $komikModel = new KomikModel();
    //     d($pencarian);

    //     return view('item_notapembelian/index', $data);
    // }

    // public function create($itemnota_notaid)
    // {
    //     // session();
    //     // dd("disini");
    //     $data = [
    //         'title' => 'Tambah Item Nota Pembelian',
    //         'validation' => \config\Services::validation(),
    //         // 'data_itemnota_notaid' => $this->request->getVar('hidden_data_itemnota_notaid'),
    //         'data_itemnota_notaid' => $itemnota_notaid,
    //     ];
    //     // $temp_data = $this->request->getVar("hidden_data_itemnota_notaid");
    //     // d($temp_data);
    //     // return view('item_notapembelian/create/' . $itemnota_notaid, $data);
    //     return view('item_notapembelian/create', $data);
    // }

    public function create()
    {
        // session();
        // dd("disini");
        $data = [
            'title' => 'Tambah Stok Barang',
            'validation' => \config\Services::validation()
        ];
        // $temp_data = $this->request->getVar("hidden_data_itemnota_notaid");
        // d($temp_data);
        // return view('item_notapembelian/create/' . $itemnota_notaid, $data);
        return view('stok_barang/create', $data);
    }

    public function save()
    {
        if (!$this->validate(
            [
                'stok_jumlah' =>
                [
                    'rules' => 'required|max_length[11]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 11 karakter',
                    ]
                ],
                'stok_namabarang' =>
                [
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'stok_satuan' =>
                [
                    'rules' => 'max_length[255]',
                    'errors' => [
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'stok_harga' =>
                [
                    'rules' => 'required|max_length[20]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 20 karakter',
                    ]
                ],
                'stok_deskripsi' =>
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

            // BARIS KODE LAKNATTTTT
            // $itemnota_notaid = $this->request->getVar('itemnota_notaid');

            // $a = "item_notapembelian/create/" + $itemnota_notaid;
            // dd($a);

            // dd("halo" . $itemnota_notaid);
            return redirect()->to('/stok_barang/create/')->withInput()->with('validation', $validation);
            // return redirect()->to('item_notapembelian/create/' . $itemnota_notaid)->withInput()->with('validation', $validation);


            // return redirect()->to('item_notapembelian/create/1')->withInput()->with('validation', $validation);
            // return redirect()->to('item_notapembelian/create/' . $itemnota_notaid)->withInput()->with('validation', $validation);
            // return redirect()->to('item_notapembelian/create')->withInput()->with('validation', $validation);

            // diatas ini, input dari withInput() akan kesimpan di session, maka session 
            // harus dinyalakan biar berfungsi
        };

        $this->StokBarangModel->save([
            'stok_jumlah' => $this->request->getVar('stok_jumlah'),
            'stok_namabarang' => $this->request->getVar('stok_namabarang'),
            'stok_satuan' => $this->request->getVar('stok_satuan'),
            'stok_harga' => $this->request->getVar('stok_harga'),
            'stok_deskripsi' => $this->request->getVar('stok_deskripsi'),
        ]);


        // dibawah ini untuk menggunakan flashdata, yaitu sebuah data yang hanya muncul sekali aja. 
        // jadi klo halaman di refresh, hilang data nya. pake session

        session()->setFlashdata('pesan', 'Stok Barang Berhasil Ditambahkan');
        // return redirect()->to('item_notapembelian');
        return redirect()->to('stok_barang/');


        // return redirect()->to('item_notapembelian');

    }

    // public function delete($stok_id)
    // {
    //     $itemnota_notaid = $this->request->getVar('hidden_data_itemnota_notaid');

    //     $this->ItemNotaPembelianModel->where('itemnota_id', $itemnota_id)->where('itemnota_notaid', $itemnota_notaid)->delete();
    //     // cara diatas ini HANYA bisa dipake kalo pencarian data yang mau dihapus menggunakan primary key
    //     // kalo misal menggunakan $this->komikModel->delete($slug); gaakan bisa, udah tak coba sendiri.
    //     // sumber nya ada di dokumentasi codeigniter

    //     session()->setFlashdata('pesan', 'Item pada Nota Pembelian Berhasil Dihapus');
    //     return redirect()->to('item_notapembelian/' . $itemnota_notaid);
    // }

    public function delete($stok_id)
    {
        $this->StokBarangModel->where('stok_id', $stok_id)->delete();
        // cara diatas ini HANYA bisa dipake kalo pencarian data yang mau dihapus menggunakan primary key
        // kalo misal menggunakan $this->komikModel->delete($slug); gaakan bisa, udah tak coba sendiri.
        // sumber nya ada di dokumentasi codeigniter

        session()->setFlashdata('pesan', 'Stok Barang Berhasil Dihapus');
        return redirect()->to('stok_barang');
    }

    // public function edit($stok_id)
    // {
    //     $itemnota_notaid = $this->request->getVar('hidden_data_itemnota_notaid');
    //     d($itemnota_id);
    //     d($itemnota_notaid);

    //     // flashdata temp_data ini menyimpan nilai itemnota_notaid
    //     if (session()->getFlashdata('temp_data')) {
    //         // dd("masuk ini");
    //         $temp = session()->getFlashdata('temp_data');
    //         $itemnota_notaid = $temp;
    //     } else {
    //         $itemnota_notaid = $this->request->getVar('hidden_data_itemnota_notaid');
    //     }
    //     // d($temp);

    //     $data = [
    //         'title' => 'Edit Item pada Nota Pembelian',
    //         'validation' => \config\Services::validation(),
    //         'dataItemNotaDiedit' => $this->ItemNotaPembelianModel->getItemNotaDetail($itemnota_id, $itemnota_notaid),
    //         'data_itemnota_notaid' => $itemnota_notaid,
    //         'data_item_id' => $itemnota_id,
    //     ];
    //     return view('item_notapembelian/edit', $data);
    // }

    public function edit($stok_id)
    {
        // SESSION DIBAWAH INI HARUS NYALA UNTUK MENGAMBIL VALIDATION  DAN DATAUSERDIEDIT!!!!
        // HABIS 4 JAM CUMA KARENA BINGUNG SESSION DIBAWAH INI MATI, jadinya gabisa akses datauserdiedit
        // FAKKK

        // BASE CONTROLLER DIMASUKKIN DI BASE CONTROLLER BIAR JALAN DARI AWALLL!!!!!!

        // session();
        $data = [
            'title' => 'Edit Stok Barang',
            'validation' => \config\Services::validation(),
            'dataStokBarangDiedit' => $this->StokBarangModel->getStokBarang($stok_id)
        ];
        return view('stok_barang/edit', $data);
    }

    // public function update($itemnota_id)
    // {
    //     /// $temp ini menyimpan nilai itemnota_notaid yang diberikan oleh view(item_notap../edit)
    //     $temp = $this->request->getVar('hidden_data_itemnota_notaid');

    //     // flashdata temp_data ini menyimpan nilai itemnota_notaid, untuk nanti digunakan lagi 
    //     // di method edit jika dipanggil lagi, dan akan nge loop terus selama dipanggil terus
    //     session()->setFlashdata('temp_data', $temp);

    //     if (!$this->validate(
    //         [
    //             // 'judul' => 'required|is_unique[komik.judul]'
    //             // 'itemnota_notaid' =>
    //             // [
    //             //     'rules' => 'required',
    //             //     'errors' => [
    //             //         'required' => '{field} harus diisi.',
    //             //     ]
    //             // ],
    //             'itemnota_namabarang' =>
    //             [
    //                 'rules' => 'required|max_length[255]',
    //                 'errors' => [
    //                     'required' => '{field} harus diisi',
    //                     'max_length' => '{field} maksimal 255 karakter',
    //                 ]
    //             ],
    //             'itemnota_jumlahbarang' =>
    //             [
    //                 'rules' => 'required|max_length[255]',
    //                 'errors' => [
    //                     'required' => '{field} harus diisi',
    //                     'max_length' => '{field} maksimal 255 karakter',
    //                 ]
    //             ],
    //             'itemnota_nominaltransaksi' =>
    //             [
    //                 'rules' => 'required|max_length[20]',
    //                 'errors' => [
    //                     'required' => '{field} harus diisi',
    //                     'max_length' => '{field} maksimal 20 karakter',
    //                 ]
    //             ],

    //         ]
    //     )) {
    //         // dd("dodol");
    //         $validation = \config\Services::validation();

    //         // session()->setFlashdata('temp_data', $put_data);
    //         // dd($validation);
    //         // dd($rule_username);
    //         // dd("apakah masuk sini?");
    //         // return redirect()->to('/admin/edit/' . $this->request->getVar('username'))->withInput()->with('validation', $validation);


    //         d($temp);
    //         // return redirect()->to('/item_notapembelian/edit/' . $itemnota_id)->withInput()->with('validation', $validation)->with('temp', $temp);
    //         return redirect()->to('/item_notapembelian/edit/' . $itemnota_id)->withInput()->with('validation', $validation);


    //         // return redirect()->to('/admin/edit/')->withInput()->with('validation', $validation);
    //     };



    //     // dibawah ini bisa
    //     // $slug = url_title($this->request->getVar('judul'), '-', true);

    //     $dataUpdate = [
    //         // 'itemnota_notaid' => $this->request->getVar('hidden_data_itemnota_notaid'),
    //         'itemnota_date' => $this->request->getVar('input_item_date'),
    //         'itemnota_namabarang' => $this->request->getVar('itemnota_namabarang'),
    //         'itemnota_jumlahbarang' => $this->request->getVar('itemnota_jumlahbarang'),
    //         'itemnota_nominaltransaksi' => (($this->request->getVar('itemnota_nominaltransaksi')) * 1000),
    //         'itemnota_catatan' => $this->request->getVar('itemnota_catatan'),
    //     ];

    //     // $this->komikModel->whereIn('slug', $slug)->set($dataUpdate)->update();
    //     // $this->komikModel->whereIn('id', [$id])->set($dataUpdate)->update();
    //     // $this->komikModel->whereIn('slug', [$slug])->set($dataUpdate)->update();
    //     // $this->komikModel->whereIn('id', [$beta])->set($dataUpdate)->update();

    //     // dibawah ini bisa, ini nyari sendiri gak ngikutin dari video hehe
    //     $this->ItemNotaPembelianModel->whereIn('itemnota_id', [$itemnota_id])->set($dataUpdate)->update();

    //     // $itemnota_notaid = $this->ItemNotaPembelianModel->
    //     // dd($this->request->getVar('hidden_data_itemnota_notaid'));


    //     session()->setFlashdata('pesan', 'Data Item pada Nota Berhasil diubah');

    //     return redirect()->to('item_notapembelian/' . $temp);
    // }

    public function update($stok_id)
    {
        // session();
        // cek judul
        // $stokLama = $this->StokBarangModel->whereIn('stok_id', [$stok_id])->first();
        // $usernameLama = $this->UserModel->getUser($this->request->getVar('username'));

        // dd($this->request->getVar('slug'));
        // dd($this->request->getVar('username'));
        // dd($usernameLama);
        // dd($usernameLama['user_name']);


        // ini diambil dari method save

        // validasi input
        if (!$this->validate(
            // 'judul' => 'required|is_unique[komik.judul]'
            [
                'stok_jumlah' =>
                [
                    'rules' => 'required|max_length[11]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 11 karakter',
                    ]
                ],
                'stok_namabarang' =>
                [
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'stok_satuan' =>
                [
                    'rules' => 'max_length[255]',
                    'errors' => [
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'stok_harga' =>
                [
                    'rules' => 'required|max_length[20]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 20 karakter',
                    ]
                ],
                'stok_deskripsi' =>
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
            return redirect()->to('/stok_barang/edit/' . $stok_id)->withInput()->with('validation', $validation);


            // return redirect()->to('/admin/edit/')->withInput()->with('validation', $validation);
        };



        // dibawah ini bisa
        // $slug = url_title($this->request->getVar('judul'), '-', true);

        $dataUpdate = [
            'stok_jumlah' => $this->request->getVar('stok_jumlah'),
            'stok_namabarang' => $this->request->getVar('stok_namabarang'),
            'stok_satuan' => $this->request->getVar('stok_satuan'),
            'stok_harga' => $this->request->getVar('stok_harga'),
            'stok_deskripsi' => $this->request->getVar('stok_deskripsi'),
        ];

        // $this->komikModel->whereIn('slug', $slug)->set($dataUpdate)->update();
        // $this->komikModel->whereIn('id', [$id])->set($dataUpdate)->update();
        // $this->komikModel->whereIn('slug', [$slug])->set($dataUpdate)->update();
        // $this->komikModel->whereIn('id', [$beta])->set($dataUpdate)->update();

        // dibawah ini bisa, ini nyari sendiri gak ngikutin dari video hehe
        $this->StokBarangModel->whereIn('stok_id', [$stok_id])->set($dataUpdate)->update();




        session()->setFlashdata('pesan', 'Stok Barang Berhasil diubah');

        return redirect()->to('stok_barang/');
    }
}
