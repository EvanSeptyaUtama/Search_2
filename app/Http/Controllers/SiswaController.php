<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
   public function index()
   {
        $siswas = Siswa::all();
        return view('index',compact('siswas'));
   }
   public function search(Request $request)
   {
      $search = $request->search;

        $query = Siswa::query();
        if ($request->filled(['nama','nis'])) {
         $query->whereAll(['nama','nis'],'LIKE', "%$search%");
        }else{
         $query->whereAny(['nama','nis'],'LIKE', "%$search%");
        }

      

        //Untuk relasi table mata kuliah
        $query->orWhereHas('matakuliah', function($query) use($search){
            $query->whereAny(['nama_matakuliah'],'LIKE', "%$search%");
        })
        ->orWhereHas('guru', function($query) use($search){
         $query->whereAny(['nama','alamat'],'LIKE',"%$search%");
        });

        $siswas = $query->get();
        return view('index',compact('siswas'));

   }
}
