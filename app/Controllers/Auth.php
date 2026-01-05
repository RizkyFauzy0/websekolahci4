<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    protected $userModel;
    protected $session;
    
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = \Config\Services::session();
    }
    
    public function login()
    {
        // If already logged in, redirect to admin dashboard
        if ($this->session->get('logged_in')) {
            return redirect()->to(base_url('admin/dashboard'));
        }
        
        return view('auth/login');
    }
    
    public function attemptLogin()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required|min_length[6]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        // Find user
        $user = $this->userModel->where('username', $username)
                                ->orWhere('email', $username)
                                ->first();
        
        if (!$user) {
            return redirect()->back()->withInput()->with('error', 'Username atau password salah');
        }
        
        // Verify password
        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Username atau password salah');
        }
        
        // Set session
        $sessionData = [
            'user_id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'nama_lengkap' => $user['nama_lengkap'],
            'role' => $user['role'],
            'logged_in' => true,
        ];
        
        $this->session->set($sessionData);
        
        return redirect()->to(base_url('admin/dashboard'))->with('success', 'Login berhasil!');
    }
    
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('admin/login'))->with('success', 'Logout berhasil!');
    }
}

