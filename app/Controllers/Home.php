<?php

namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\SliderModel;
use App\Models\BeritaModel;
use App\Models\GuruModel;
use App\Models\SiswaModel;
use App\Models\PrestasiModel;

class Home extends BaseController
{
    protected $settingModel;
    protected $sliderModel;
    protected $beritaModel;
    protected $guruModel;
    protected $siswaModel;
    protected $prestasiModel;
    
    public function __construct()
    {
        $this->settingModel = new SettingModel();
        $this->sliderModel = new SliderModel();
        $this->beritaModel = new BeritaModel();
        $this->guruModel = new GuruModel();
        $this->siswaModel = new SiswaModel();
        $this->prestasiModel = new PrestasiModel();
    }
    
    public function index(): string
    {
        // Get settings
        $settings = $this->settingModel->first();
        if (!$settings) {
            $settings = [
                'nama_sekolah' => 'Website Sekolah',
                'alamat' => '',
                'telepon' => '',
                'email' => '',
                'website' => '',
                'logo' => '',
                'maps_embed' => '',
            ];
        }
        
        // Get active sliders
        $sliders = $this->sliderModel
            ->where('status', 'aktif')
            ->orderBy('urutan', 'ASC')
            ->findAll();
        
        // Get latest news (6 items)
        $latest_berita = $this->beritaModel
            ->where('status', 'published')
            ->orderBy('tanggal_publish', 'DESC')
            ->limit(6)
            ->findAll();
        
        // Get active teachers (8 items)
        $guru = $this->guruModel
            ->where('status', 'aktif')
            ->limit(8)
            ->findAll();
        
        // Get statistics
        $total_siswa = $this->siswaModel->where('status', 'aktif')->countAllResults();
        $total_guru = $this->guruModel->where('status', 'aktif')->countAllResults();
        $total_prestasi = $this->prestasiModel->countAllResults();
        
        $data = [
            'title' => 'Dashboard',
            'settings' => $settings,
            'sliders' => $sliders,
            'latest_berita' => $latest_berita,
            'guru' => $guru,
            'total_siswa' => $total_siswa,
            'total_guru' => $total_guru,
            'total_prestasi' => $total_prestasi,
        ];
        
        return view('frontend/home', $data);
    }
}

