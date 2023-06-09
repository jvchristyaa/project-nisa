<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginAsisten extends Model
{
    protected $table = 'login';
    protected $allowedFields = ['username', 'password'];


    public function simpan($record)
    {
        $this->save([
            'username' => $record['usr'],
            'password' => $record['pwd'],
        ]);
    }
    
    public function hapus($record)
    {
        $this->delete([
            'username' => $record['usr']
        ]);
    }

    public function user($usr)
    {
        return $this->where(['username' => $usr])->first();
    }
}