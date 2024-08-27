<?php

namespace App\Controllers;
use App\Models\KomikModel;

class Pages extends BaseController
{

    protected $komikModel;
public function __construct()
{
    $this->komikModel = new KomikModel();
}
    public function index()
    {
        $data = [
            'title' => 'Home Datang'
        ];
        
        return view('pages/home', $data);
        
    }


    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];
        
        echo view ('pages/about',$data);
        
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. abc No. 123',
                    'kota' => 'Jakarta'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl. Petukangan utara No. 48',
                    'kota' => 'Jakata'
                ]
            ]
        ];

        return view('pages/contact', $data);
    }

//     public function komik1()
//     {
//         $data = [
//             'title' => 'Home Datang'
//         ];
//         $data['komik1'] = $this->model_komik->getKomik();
// return view('pages/komik1', $data);

        
//         return view('pages/komik1', $data);
        
 

// }

public function komik()
{
    $komik = $this->komikModel->findAll();
    
    $data = [
        'title' => 'Daftar Komik',
        // 'komik' => $this->komikModel->getKomik()
        'komik' => $komik
        // cara konek db tanpa model
        // $db =\Config\Database::connect();
        // $komik = $db->query("select * FROM KOMIK");
        // dd($komik);
        // foreach ($komik->getResultArray() as $row)
        // {d($row);} 
    ];
    

    // $komikModel = new \App\Models\KomikModel();
    // $komikModel = new KomikModel();

    return view ('pages/komik1', $data);
}
}