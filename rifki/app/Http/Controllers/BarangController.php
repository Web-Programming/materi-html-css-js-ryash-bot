<?php
namespace App\Http\Controllers;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        if (Gate::denies('create-product')) {
            abort(403, 'Unauthorized');
        }
        return view('barang.create');
    }

    public function store(Request $request)
    {
        if (Gate::denies('create-product')) {
            abort(403, 'Unauthorized');
        }
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|integer',
            'status' => 'required',
            'harga' => 'required|numeric',
            'tgl_input' => 'required|date',
        ]);

        Barang::create($request->all());
        return redirect()->route('barang.index')->with('success', 'Barang created successfully.');
    }
}