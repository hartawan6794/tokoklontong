<?php

namespace App\Controllers;

use App\Models\NotaPelangganModel;

class NotaPelanggan extends BaseController
{
    // protected $StokBarangModel;
    protected $NotaPelangganModel;
    protected $OmzetHarianModel;

    public function __construct()
    {
        $this->NotaPelangganModel = new \App\Models\NotaPelangganModel();
        $this->OmzetHarianModel = new \App\Models\OmzetHarianModel();
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
            $pencarian = $this->NotaPelangganModel->fiturCari($keyword);
            // dd("masuk sini");
        } else if ($input_date_begin && $input_date_end) {
            $pencarian = $this->NotaPelangganModel->fiturCariWaktu($input_date_begin, $input_date_end);
        } else {
            $pencarian = $this->NotaPelangganModel->getStokBarang();
            // d("masuk else ");
        }

        $data = [
            'title' => 'Nota Pelanggan',
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

        return view('nota_pelanggan/index', $data);
    }

    public function create()
    {
        // session();
        // dd("disini");


        $data = [
            'title' => 'Tambah Nota Pelanggan',
            'validation' => \config\Services::validation()
        ];
        // $temp_data = $this->request->getVar("hidden_data_itemnota_notaid");
        // d($temp_data);
        // return view('item_notapembelian/create/' . $itemnota_notaid, $data);
        return view('nota_pelanggan/create', $data);
    }

    // if ($omzetLama['omzet_date'] == $this->request->getVar('input_omzet_date')) {
    //     // dd("masuk if");
    //     $rule_omzet_date = 'required';
    // }
    // // else if(strlen($this->request->getVar('username')) > 20){

    // // } 
    // else {
    //     // dd("masuk else");
    //     $rule_omzet_date = 'required|is_unique[omzet_harian.omzet_date]';
    // }



    // // ini diambil dari method save

    // // validasi input
    // if (!$this->validate(
    //     [
    //         // 'judul' => 'required|is_unique[komik.judul]'
    //         'input_omzet_date' =>
    //         [
    //             'rules' => $rule_omzet_date,
    //             'errors' => [
    //                 'required' => '{field} harus diisi.',
    //                 'is_unique' => '{field} sudah terdaftar',
    //             ]
    //         ],

    public function save()
    {



        if (!$this->validate(
            [
                'notapel_namapelanggan' =>
                [
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'notapel_catatan' =>
                [
                    'rules' => 'max_length[255]',
                    'errors' => [
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'subnotapel_namabarang' =>
                [
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'subnotapel_jumlahpembelian' =>
                [
                    'rules' => 'required|max_length[11]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 11 karakter',
                    ]
                ],
                'subnotapel_notapelid' =>
                [
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],

                //

                // 'notapel_ismain' =>
                // [
                //     'rules' => 'required|max_length[255]',
                //     'errors' => [
                //         'required' => '{field} harus diisi',
                //         'max_length' => '{field} maksimal 255 karakter',
                //     ]
                // ],
                // 'notapel_grandtotal' =>
                // [
                //     'rules' => 'required|max_length[255]',
                //     'errors' => [
                //         'required' => '{field} harus diisi',
                //         'max_length' => '{field} maksimal 255 karakter',
                //     ]
                // ],
                // 'subnotapel_idstokbarang' =>
                // [
                //     'rules' => 'required|max_length[255]',
                //     'errors' => [
                //         'required' => '{field} harus diisi',
                //         'max_length' => '{field} maksimal 255 karakter',
                //     ]
                // ],
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
            return redirect()->to('/nota_pelanggan/create/')->withInput()->with('validation', $validation);
            // return redirect()->to('item_notapembelian/create/' . $itemnota_notaid)->withInput()->with('validation', $validation);


            // return redirect()->to('item_notapembelian/create/1')->withInput()->with('validation', $validation);
            // return redirect()->to('item_notapembelian/create/' . $itemnota_notaid)->withInput()->with('validation', $validation);
            // return redirect()->to('item_notapembelian/create')->withInput()->with('validation', $validation);

            // diatas ini, input dari withInput() akan kesimpan di session, maka session 
            // harus dinyalakan biar berfungsi
        };

        // $temp = "2023-02-09";
        $temp =  $this->request->getVar('input_nota_date');
        $temp2 = $this->OmzetHarianModel->fiturCariWaktu($temp, $temp);

        // dd($temp2);
        // ini untuk ngecek apakah omzet tgl tsb sudah ada atau belum, karena omzet harus unique u/ 
        // setiap tanggal
        if ($temp2) {
            // if true = maka omzet tgl segitu udah ada
            // dd("masuk 1");

        } else {
            // dd("false");
            $this->OmzetHarianModel->save([
                'omzet_date' => $temp,
                'omzet_nominal' => 0,
                'omzet_catatan' => " ",
            ]);
        }

        $this->NotaPelangganModel->save([
            'notapel_date' => $temp,
            'notapel_namapelanggan' => $this->request->getVar('notapel_namapelanggan'),
            'notapel_ismain' => 1,
            'notapel_grandtotal' => 0,
            'notapel_catatan' => $this->request->getVar('notapel_catatan'),
        ]);


        // dibawah ini untuk menggunakan flashdata, yaitu sebuah data yang hanya muncul sekali aja. 
        // jadi klo halaman di refresh, hilang data nya. pake session

        session()->setFlashdata('pesan', 'Nota Pelanggan Berhasil Ditambahkan');
        // return redirect()->to('item_notapembelian');
        return redirect()->to('nota_pelanggan/');


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

    public function delete($notapel_id)
    {
        $this->NotaPelangganModel->where('notapel_id', $notapel_id)->delete();
        // cara diatas ini HANYA bisa dipake kalo pencarian data yang mau dihapus menggunakan primary key
        // kalo misal menggunakan $this->komikModel->delete($slug); gaakan bisa, udah tak coba sendiri.
        // sumber nya ada di dokumentasi codeigniter

        session()->setFlashdata('pesan', 'Nota Pelanggan Berhasil Dihapus');
        return redirect()->to('nota_pelanggan');
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

    public function edit($notapel_id)
    {
        // SESSION DIBAWAH INI HARUS NYALA UNTUK MENGAMBIL VALIDATION  DAN DATAUSERDIEDIT!!!!
        // HABIS 4 JAM CUMA KARENA BINGUNG SESSION DIBAWAH INI MATI, jadinya gabisa akses datauserdiedit
        // FAKKK

        // BASE CONTROLLER DIMASUKKIN DI BASE CONTROLLER BIAR JALAN DARI AWALLL!!!!!!

        // session();
        $data = [
            'title' => 'Edit Nota Pelanggan',
            'validation' => \config\Services::validation(),
            'dataNotaPelangganDiedit' => $this->NotaPelangganModel->getNotaPelanggan($notapel_id)
        ];
        return view('nota_pelanggan/edit', $data);
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

    public function update($notapel_id)
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
                'notapel_namapelanggan' =>
                [
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'notapel_catatan' =>
                [
                    'rules' => 'max_length[255]',
                    'errors' => [
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'subnotapel_namabarang' =>
                [
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'subnotapel_jumlahpembelian' =>
                [
                    'rules' => 'required|max_length[11]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 11 karakter',
                    ]
                ],
                'subnotapel_notapelid' =>
                [
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => '{field} harus diisi',
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
            return redirect()->to('/nota_pelanggan/edit/' . $notapel_id)->withInput()->with('validation', $validation);


            // return redirect()->to('/admin/edit/')->withInput()->with('validation', $validation);
        };



        // dibawah ini bisa
        // $slug = url_title($this->request->getVar('judul'), '-', true);



        $temp =  $this->request->getVar('input_nota_date');
        $temp2 = $this->NotaPelangganModel->getNotaPelanggan($notapel_id);

        // $temp = $this->SupplierContactModel->getSupplier(4);
        // $temp2 = $temp['supp_nama'];
        // dd($temp2);

        // $temp2 = $this->OmzetHarianModel->fiturCariWaktu($temp, $temp);

        if ($temp == $temp2['notapel_date']) {
            // ini adalah jika input tanggal baru = tanggal lama dari nota tersebut
        }

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
