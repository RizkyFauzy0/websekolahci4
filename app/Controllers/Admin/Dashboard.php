<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\GuruModel;
use App\Models\SiswaModel;
use App\Models\PrestasiModel;
use App\Models\SliderModel;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    protected $session;
    
    public function __construct()
    {
        $this->session = \Config\Services::session();
        
        // Check if user is logged in
        if (!$this->session->get('logged_in')) {
            header('Location: ' . base_url('admin/login'));
            exit;
        }
    }
    
    public function index()
    {
        $beritaModel = new BeritaModel();
        $guruModel = new GuruModel();
        $siswaModel = new SiswaModel();
        $prestasiModel = new PrestasiModel();
        $sliderModel = new SliderModel();
        
        $data = [
            'title' => 'Dashboard',
            'total_berita' => $beritaModel->countAllResults(),
            'total_guru' => $guruModel->countAllResults(),
            'total_siswa' => $siswaModel->countAllResults(),
            'total_prestasi' => $prestasiModel->countAllResults(),
            'total_slider' => $sliderModel->countAllResults(),
        ];
        
        return view('admin/dashboard', $data);
    }
}

