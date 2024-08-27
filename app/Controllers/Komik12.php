<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }
    public function index()
    {
        // $komik = $this->komikModel->findAll();
        
        $data = [
            'title' => 'Daftar Komik',
            'komik' => $this->komikModel->getKomik()
            // cara konek db tanpa model
            // $db =\Config\Database::connect();
            // $komik = $db->query("select * FROM KOMIK");
            // dd($komik);
            // foreach ($komik->getResultArray() as $row)
            // {d($row);} 
        ];
        

        // $komikModel = new \App\Models\KomikModel();
        // $komikModel = new KomikModel();

        return view ('pages/komik', $data);
    }

    public function detail ($slug)
    {
        
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug)
        ];

        // jika komik tidak ada di table
        if(empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik' . $slug . 'tidak
            ditemukan.');
        }

        return view ('komik/detail', $data);
    }

    public function create()
    {
        session();
        $data = [
            'title' => 'Form Tambah Data Komik',
            'validation' => session()->getFlashdata('validation') ??\config\Services::validation()
        ];

        return view('komik/create', $data);
    }

    
    
    
    public function save()
    {   
        // $this-KomikModel->save([
        //     'judul' => $this->request->getVar('judul'),
        //     'penulis' => $this->request->getVar('penulis'),
        //     'penerbit' => $this->request->getVar('penerbit'),
        //     'sampul' => $this->request->getVar('sampul')
        // ])
        // validasi input
        if(!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus diisi.',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
                ],
                'sampul' => [
                    'rules' => 
                    'max_size[sampul,1029]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                    'errors' => [                      
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    
                ]
                ]
        ])) {
            $file = $this->request->getFile('sampul');
            session()->setFlashdata('validation', \Config\Services::validation());
        return redirect()->to('/komik/create')->withInput();
   // return redirect()->back()->withInput()->with('validation', $validation);
        }
        
        // ambil gambar
        $fileSampul = $this->request->getFile('sampul');
        
      if($fileSampul->getError() == 4){
        $namaSampul = 'default.jpg';
      }else{

          $namaSampul = $fileSampul->getRandomName();
          $fileSampul->move('img', $namaSampul);
    //       // ambil nama file sampul
      }
        // pindahkan file ke folder

        $slug = url_title($this->request->getVar('judul'),'-', true);
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
            // 'sampul' => $this->request->getVar('sampul')
            // 'sampul' => $this->request->getVar('sampul')
        ]);

        session()->setFlashdata('pesan','Data berhasil Ditambahkan.');
        
        return redirect()->to('/pages/komik');
        // $this->request->getVar();
        // kalo mau ngambil satuan isi ke get var 'judul'
    }


    
    public function delete($id)
    {
        $this->komikModel->delete($id);
        session()->setFlashdata('pesan','Data berhasil Dihapus.');
        return redirect()->to('/pages/komik');
    }

    public function edit($slug)
    {
        
            // session();
            $data = [
                'title' => 'Form Ubah Data Komik',
                'validation' => \config\Services::validation(),
                'komik' => $this->komikModel->getKomik($slug)
            ];
    
            return view('komik/edit', $data);
        
    }
    
    public function update($id)
    {
        // cek judul
        $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
        if($komikLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[komik.judul]';
        }

        if(!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} komik harus diisi.',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
                ]
                
        ])) {
            $validation = \config\Services::validation();
            return redirect()->to(base_url().'/komik/edit/'. $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('judul'),'-', true);
        $this->komikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')
        ]);

        session()->setFlashdata('pesan','Data berhasil Diubah.');
        
        return redirect()->to('/pages/komik');
    }

    public function do_upload()
    {
        $this->validateData([], [
            'sampul' => [
                'uploaded[sampul]',
                'max_size[sampul,1024]',
                'mime_in[sampul,image/png,image/jpg,image/gif]',
                'ext_in[sampul,png,jpg,gif]',
                'max_dims[sampul,1024,768]',
            ],
        ]);

        $file = $this->request->getFile('sampul');

        if (! $path = $file->store()) {
            return view('/komik/create', ['error' => 'upload failed']);
        }
        $data = ['upload_file_path' => $path];

        return view('upload_success', $data);
    }
}

