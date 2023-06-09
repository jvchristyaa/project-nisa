<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('login/loginpage');
    }
    public function check()
    {
        $post = $this->request->getPost(['usr','pwd']);
        if ($post['usr']=='admin'&& $post['pwd'] == '123') {
            $session = session();
            $session->set('pengguna', $post['usr']);
            return view('login/home');
        }else{
            return view ('login/fail');
        }
    }
    public function home()
    {
        $session = session();
        if($session->has('pengguna')){
            $item = $session->get('pengguna');
            if($item == 'admin'){
                return view('login/home');
            }else{
                return view('login/loginpage');
            }

        }else{
            return view('login/loginpage');
        }
    }
    public function logout()
    {
        $session = session();
        $session->remove('pengguna');
        return view('login/logoutsucces');
    }
}