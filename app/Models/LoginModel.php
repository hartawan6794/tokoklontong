<?php

namespace App\Models;

use CodeIgniter\Model;

use function PHPUnit\Framework\isNull;

class LoginModel extends Model
{
    protected $table = 'user';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;

    // settingn dibawah ngaruh ke verifikasi password bagian login nya, 
    // pas ngambil username/password di bagian if pada controller login
    protected $returnType = "object";

    // dibawah ini untuk mengijinkan jika field2 tersebut akan diisi manual oleh kita
    protected $allowedFields = ['user_name', 'user_password', 'user_isowner'];
    // protected $primaryKey = 'id';

}
