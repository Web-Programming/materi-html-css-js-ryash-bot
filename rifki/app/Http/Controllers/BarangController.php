<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    function index(){
        $listbarang = Barang::all();
        $title = "Darftar Barang";
        return view("barang.index",
        [
            "listbarang" => $listbarang,
            "title" => $title
        ]);
    }
}
