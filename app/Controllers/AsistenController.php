<?php

namespace App\Controllers;

use App\Models\AsistenModel;

class AsistenController extends BaseController
{
    protected $asistenModel;
    public function __construct()
    {
        $this->asistenModel = new AsistenModel();
    }

    public function show()
    {
        $asisten = $this->asistenModel->findAll();
        $data = [
            'list' => $asisten
        ];
        return view('/asisten/AsistenView', $data);
    }

    public function index()
    {
        return view('/asisten/AsistenView');
    }

    public function simpan()
    {
        helper('form');
        // Memeriksa apakah melakukan submit data atau tidak.
        if (!$this->request->is('post')) {
            return view('/asisten/Simpan');
        }
        // Mengambil data yang disubmit dari form
        $post = $this->request->getPost([
            'nim', 'nama', "praktikum",
            "ipk"
        ]);
        // Mengakses Model untuk menyimpan data
        $model = model(AsistenModel::class);
        $model->simpan($post);
        return view('/asisten/Success');
    }

    public function edit()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('asisten');
        helper('form');
        if (!$this->request->is('post')) {
            return view('/asisten/Update');
        }
        $data = [
            'nama' => [$this->request->getPost('nama')],
            'praktikum' => [$this->request->getPost('praktikum')],
            'ipk' => [$this->request->getPost('ipk')],
        ];
        $builder->where('nim', $this->request->getPost('nim'));
        $builder->update($data);

        return view('/asisten/Success');
    }

    public function delete()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('asisten');
        helper('form');
        if (!$this->request->is('post')) {
            return view('/asisten/Hapus');
        }
        $post = $this->request->getPost([
            'nim'
        ]);
        $builder->where('nim', $post);
        $builder->delete();
        return view('/asisten/Success');
    }

    public function search()
    {
        if (!$this->request->is('post')) {
            return view('/asisten/search');
        }

        $nim = $this->request->getPost(['nim']);

        $model = model(AsistenModel::class);
        $asisten = $model->ambil($nim['nim']);

        $data = ['hasil' => $asisten];
        return view('/asisten/search', $data);
    }

    public function login()
    {
        $model = model(LoginAsisten::class);
        $user = $model->user('username');
        $pwd = $model->user('password');
        $post = $this->request->getPost(['usr', 'pwd']);
        if ($post['usr'] == $user  && $post['pwd'] == $pwd) {
            $session = session();
            $session->set('username', $post['usr']);
            $session->set('password', $post['pwd']);
            return view('/asisten/AsistenView');
        } else {
            return view('/asisten/login');
        }
    }
}