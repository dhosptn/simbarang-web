<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function login()
    {
        helper(['form']);

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if (!$email) {
            return view('user/login');
        }

        $session = session();
        $model = new UserModel();
        $login = $model->where('useremail', $email)->first();

        if ($login) {
            $pass = $login['userpassword'];
            if (password_verify($password, $pass)) {
                $session->set([
                    'user_id'    => $login['id'],
                    'user_name'  => $login['username'],
                    'user_email' => $login['useremail'],
                    'logged_in'  => true,
                ]);
                return redirect()->to('/barang');
            } else {
                $session->setFlashdata('flash_msg', 'Password salah.');
                return redirect()->to('/user/login');
            }
        } else {
            $session->setFlashdata('flash_msg', 'Email tidak terdaftar.');
            return redirect()->to('/user/login');
        }
    }

    public function logout() 
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}