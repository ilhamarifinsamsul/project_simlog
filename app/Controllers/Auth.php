<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    private $modeluser;
    public function __construct()
    {
        $this->modeluser = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('loginview/index', $data);
    }

    public function proses_login()
    {


        $username = htmlspecialchars($this->request->getVar('username'), true);
        $password = htmlspecialchars($this->request->getVar('password'), true);

        $res = $this->modeluser->cekLogin($username);

        if (count($res) > 0) {
            $userData = $res[0];
            if (password_verify($password, $userData['password'])) {

                if ($userData) {
                    $this->alert->set('success', 'Success', 'User Login');
                    session()->set('id_user', $userData['id_user']);
                    session()->set('username', $userData['username']);
                    session()->set('id_role', $userData['id_role']);
                    return redirect()->to('dashboard');
                }
            } else {
                $this->alert->set('warning', 'Warning', 'Password Salah');
            }
        } else {
            $this->alert->set('warning', 'Warning', 'User Gak Ada');
        }

        return redirect()->to('auth');
    }

    public function logout()
    {
        session()->remove('id_user');
        session()->remove('id_role');
        session()->remove('username');
        session()->destroy();

        return redirect()->to('auth');
    }
}
