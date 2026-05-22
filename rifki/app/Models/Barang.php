<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang'; // sesuaikan dengan nama tabel Anda jika tidak jamak
    
    protected $fillable = [
        'nama_barang',
        'jumlah',
        'status',
        'harga',
        'tgl_input'
    ];
}
