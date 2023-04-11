<?php

namespace App\Controllers;

class Login extends BaseController
{
    protected $UserModel;

    public function __construct()
    {
        $this->UserModel = new \App\Models\UserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Halaman Login'
        ];
        return view('login/index', $data);
        // echo "Holla amigo!";
    }

    public function process()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $this->UserModel->where([
            'user_name' => $username,
        ])->first();

        // $datauser ini kalau method where nya ketemu, maka isinya adalah array berisi tabel data username yang dipake login

        // penulisan dibawah kalo return type nya non-object, atau array. sesuai settingan di model
        // dd($dataUser['password']);

        // penulisan dibawha untuk return type object
        // d($dataUser->password);

        // d($password);
        // dd(password_verify($password, $dataUser->password));

        if ($dataUser) {
            // passsword_verify ini pake HASH lalala, jadi waktu input passwordnya ke db juga 
            // perlu pake HASH di kodingnya
            // if (password_verify($password, $dataUser->password)) {

            // $dataUser->user_password) 
            // kode diatas untuk mengambil isi pada array dataUser, yang sesuai dengan data pada database user yang diambil

            if ($password == $dataUser['user_password']) {
                session()->set([
                    // 'username' => $dataUser->user_name,
                    // 'user_isowner' => $dataUser->user_isowner,
                    'username' => $dataUser['user_name'],
                    'user_isowner' => $dataUser['user_isowner'],
                    'logged_in' => TRUE
                ]);
                // return redirect()->to(base_url('home'));
                // dd("masuk sini gak?");
                return redirect()->to('/');
            } else {
                // dd("masuk ELSEEEEE");
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }
}
