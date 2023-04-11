<?php

namespace App\Controllers;

use App\Models\HutangPelangganModel;

class ItemNotaPembelian extends BaseController
{
    protected $ItemNotaPembelianModel;

    public function __construct()
    {
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
            $pencarian = $this->ItemNotaPembelianModel->fiturCari($keyword);
            // dd("masuk sini");
        } else if ($input_date_begin && $input_date_end) {
            $pencarian = $this->ItemNotaPembelianModel->fiturCariWaktu($input_date_begin, $input_date_end);
        } else {
            $pencarian = $this->ItemNotaPembelianModel->getItemNota();
            // d("masuk else ");
        }

        $data = [
            'title' => 'Item Nota Pembelian',
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

        return view('item_notapembelian/index', $data);
    }

    public function detail_nota_item($itemnota_notaid)
    {
        // d($this->request->getVar('keyword'));
        // getVar ini bisa ngambil GET bisa ngambil POST

        $keyword = $this->request->getVar('keyword');
        $input_date_begin = $this->request->getVar('input-date-begin');
        $input_date_end = $this->request->getVar('input-date-end');

        // $keyword = $this->request->getGet('keyword');
        if ($keyword) {
            // d("masuk if ");
            $pencarian = $this->ItemNotaPembelianModel->fiturCariDetail($keyword, $itemnota_notaid);
            // dd("masuk sini");
        } else if ($input_date_begin && $input_date_end) {
            $pencarian = $this->ItemNotaPembelianModel->fiturCariWaktuDetail($input_date_begin, $input_date_end, $itemnota_notaid);
        } else {
            $pencarian = $this->ItemNotaPembelianModel->getItemNotaDetail(false, $itemnota_notaid);
            // d("masuk else ");
        }

        $data = [
            'title' => 'Detail Item Nota Pembelian',
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

            'data_itemnota_notaid' => $itemnota_notaid,

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

        return view('item_notapembelian/index', $data);
    }

    public function create($itemnota_notaid)
    {
        // session();
        // dd("disini");
        $data = [
            'title' => 'Tambah Item Nota Pembelian',
            'validation' => \config\Services::validation(),
            // 'data_itemnota_notaid' => $this->request->getVar('hidden_data_itemnota_notaid'),
            'data_itemnota_notaid' => $itemnota_notaid,
        ];
        // $temp_data = $this->request->getVar("hidden_data_itemnota_notaid");
        // d($temp_data);
        // return view('item_notapembelian/create/' . $itemnota_notaid, $data);
        return view('item_notapembelian/create', $data);
    }

    public function save($itemnota_notaid)
    {
        if (!$this->validate(
            [

                'itemnota_namabarang' =>
                [
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'itemnota_jumlahbarang' =>
                [
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'itemnota_nominaltransaksi' =>
                [
                    'rules' => 'required|max_length[20]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 20 karakter',
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
            return redirect()->to('/item_notapembelian/create/' . $itemnota_notaid)->withInput()->with('validation', $validation);
            // return redirect()->to('item_notapembelian/create/' . $itemnota_notaid)->withInput()->with('validation', $validation);


            // return redirect()->to('item_notapembelian/create/1')->withInput()->with('validation', $validation);
            // return redirect()->to('item_notapembelian/create/' . $itemnota_notaid)->withInput()->with('validation', $validation);
            // return redirect()->to('item_notapembelian/create')->withInput()->with('validation', $validation);

            // diatas ini, input dari withInput() akan kesimpan di session, maka session 
            // harus dinyalakan biar berfungsi
        };

        $this->ItemNotaPembelianModel->save([
            'itemnota_notaid' => $itemnota_notaid,
            'itemnota_date' => $this->request->getVar('input_item_date'),
            'itemnota_namabarang' => $this->request->getVar('itemnota_namabarang'),
            'itemnota_jumlahbarang' => $this->request->getVar('itemnota_jumlahbarang'),
            'itemnota_nominaltransaksi' => (($this->request->getVar('itemnota_nominaltransaksi')) * 1000),
            'itemnota_catatan' => $this->request->getVar('itemnota_catatan'),
        ]);


        // dibawah ini untuk menggunakan flashdata, yaitu sebuah data yang hanya muncul sekali aja. 
        // jadi klo halaman di refresh, hilang data nya. pake session

        session()->setFlashdata('pesan', 'Item pada Nota Pembelian Berhasil Ditambahkan');
        // return redirect()->to('item_notapembelian');
        return redirect()->to('item_notapembelian/' . $itemnota_notaid);


        // return redirect()->to('item_notapembelian');

    }

    public function delete($itemnota_id)
    {
        $itemnota_notaid = $this->request->getVar('hidden_data_itemnota_notaid');

        $this->ItemNotaPembelianModel->where('itemnota_id', $itemnota_id)->where('itemnota_notaid', $itemnota_notaid)->delete();
        // cara diatas ini HANYA bisa dipake kalo pencarian data yang mau dihapus menggunakan primary key
        // kalo misal menggunakan $this->komikModel->delete($slug); gaakan bisa, udah tak coba sendiri.
        // sumber nya ada di dokumentasi codeigniter

        session()->setFlashdata('pesan', 'Item pada Nota Pembelian Berhasil Dihapus');
        return redirect()->to('item_notapembelian/' . $itemnota_notaid);
    }

    public function edit($itemnota_id)
    {
        $itemnota_notaid = $this->request->getVar('hidden_data_itemnota_notaid');
        d($itemnota_id);
        d($itemnota_notaid);

        // flashdata temp_data ini menyimpan nilai itemnota_notaid
        if (session()->getFlashdata('temp_data')) {
            // dd("masuk ini");
            $temp = session()->getFlashdata('temp_data');
            $itemnota_notaid = $temp;
        } else {
            $itemnota_notaid = $this->request->getVar('hidden_data_itemnota_notaid');
        }
        // d($temp);

        $data = [
            'title' => 'Edit Item pada Nota Pembelian',
            'validation' => \config\Services::validation(),
            'dataItemNotaDiedit' => $this->ItemNotaPembelianModel->getItemNotaDetail($itemnota_id, $itemnota_notaid),
            'data_itemnota_notaid' => $itemnota_notaid,
            'data_item_id' => $itemnota_id,
        ];
        return view('item_notapembelian/edit', $data);
    }

    // public function update()

    // dibawah ini bisa
    // harusnya gapake parameter $id itu bisa kok, tapi masalahnya kan nanti 
    // semua value2 kalo diedit bakal berubah
    public function update($itemnota_id)
    {
        /// $temp ini menyimpan nilai itemnota_notaid yang diberikan oleh view(item_notap../edit)
        $temp = $this->request->getVar('hidden_data_itemnota_notaid');

        // flashdata temp_data ini menyimpan nilai itemnota_notaid, untuk nanti digunakan lagi 
        // di method edit jika dipanggil lagi, dan akan nge loop terus selama dipanggil terus
        session()->setFlashdata('temp_data', $temp);

        if (!$this->validate(
            [
                // 'judul' => 'required|is_unique[komik.judul]'
                // 'itemnota_notaid' =>
                // [
                //     'rules' => 'required',
                //     'errors' => [
                //         'required' => '{field} harus diisi.',
                //     ]
                // ],
                'itemnota_namabarang' =>
                [
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'itemnota_jumlahbarang' =>
                [
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 255 karakter',
                    ]
                ],
                'itemnota_nominaltransaksi' =>
                [
                    'rules' => 'required|max_length[20]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'max_length' => '{field} maksimal 20 karakter',
                    ]
                ],

            ]
        )) {
            // dd("dodol");
            $validation = \config\Services::validation();

            // session()->setFlashdata('temp_data', $put_data);
            // dd($validation);
            // dd($rule_username);
            // dd("apakah masuk sini?");
            // return redirect()->to('/admin/edit/' . $this->request->getVar('username'))->withInput()->with('validation', $validation);


            d($temp);
            // return redirect()->to('/item_notapembelian/edit/' . $itemnota_id)->withInput()->with('validation', $validation)->with('temp', $temp);
            return redirect()->to('/item_notapembelian/edit/' . $itemnota_id)->withInput()->with('validation', $validation);


            // return redirect()->to('/admin/edit/')->withInput()->with('validation', $validation);
        };



        // dibawah ini bisa
        // $slug = url_title($this->request->getVar('judul'), '-', true);

        $dataUpdate = [
            // 'itemnota_notaid' => $this->request->getVar('hidden_data_itemnota_notaid'),
            'itemnota_date' => $this->request->getVar('input_item_date'),
            'itemnota_namabarang' => $this->request->getVar('itemnota_namabarang'),
            'itemnota_jumlahbarang' => $this->request->getVar('itemnota_jumlahbarang'),
            'itemnota_nominaltransaksi' => (($this->request->getVar('itemnota_nominaltransaksi')) * 1000),
            'itemnota_catatan' => $this->request->getVar('itemnota_catatan'),
        ];

        // $this->komikModel->whereIn('slug', $slug)->set($dataUpdate)->update();
        // $this->komikModel->whereIn('id', [$id])->set($dataUpdate)->update();
        // $this->komikModel->whereIn('slug', [$slug])->set($dataUpdate)->update();
        // $this->komikModel->whereIn('id', [$beta])->set($dataUpdate)->update();

        // dibawah ini bisa, ini nyari sendiri gak ngikutin dari video hehe
        $this->ItemNotaPembelianModel->whereIn('itemnota_id', [$itemnota_id])->set($dataUpdate)->update();

        // $itemnota_notaid = $this->ItemNotaPembelianModel->
        // dd($this->request->getVar('hidden_data_itemnota_notaid'));


        session()->setFlashdata('pesan', 'Data Item pada Nota Berhasil diubah');

        return redirect()->to('item_notapembelian/' . $temp);
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
