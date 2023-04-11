<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // $komik = $this->komikModel->findAll();

        // d($this->request->getVar('keyword'));
        // getVar ini bisa ngambil GET bisa ngambil POST

        // kode dibawah ini sama aja, tapi jelas lebih safety pake isLogin karena kalo 
        // cuma ngecek data session 'username', bisa aja itu diisi manual
        // if (null != session()->get('username')) {
        // if (session()->islogin) {



        $data = [
            'title' => 'Halaman Utama',
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
            // 'komik' => $pencarian,
            // dd("masuk sini");

            // 'komik' => $this->komikModel->paginate(3, 'komik'),
            // 'pager' => $this->komikModel->pager
        ];
        return view('/index', $data);
        // } else {
        // return view('/login', $data);

        // session()->setFlashdata('error', 'Harap Login Terlebih Dahulu');
        // return redirect()->to('/login');
        // }
    }
}
