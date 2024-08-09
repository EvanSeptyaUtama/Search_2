<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\Matakuliah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $fillable = ['nama', 'nis', 'usia', 'alamat', 'matakuliah_id','guru_id'];

    public function matakuliah()
    {
       return $this->belongsTo(Matakuliah::class,'matakuliah_id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
