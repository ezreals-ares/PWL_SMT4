<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index() {
        // $data = [
        //     'Kategori_kode' => 'PKN',
        //     'Kategori_nama' => 'Pakaian',
        //     'created_at' => now()
        // ];
        // DB::table('m_kategori')->insert($data);
        // return 'Insert data baru berhasil';

    //    $row = DB::table('m_kategori')
    //         ->where('kategori_kode', 'SNK')
    //         ->delete();
    //     return 'Delete data berhasil. jumlah data yang dihapus: ' . $row . ' baris';
    
        $data = DB::table('m_kategori')->get();
        return view('kategori', ['data' => $data]);
    }
}
