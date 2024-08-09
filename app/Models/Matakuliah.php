<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliahs';
    protected $fillable = ['nama_matakuliah'];
    public function siswas()
    {
        $this->hasMany(Siswa::class);
    }
}
