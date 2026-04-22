<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // 🔍 + 💰 INDEX + SEARCH
    public function index(Request $request)
    {
        $query = Transaksi::query();

        // fitur search
        if ($request->has('search') && $request->search != '') {
            $query->where('keterangan', 'like', '%' . $request->search . '%');
        }

        $data = $query->orderBy('tanggal', 'desc')->get();

        // hitung saldo
        $saldo = 0;
        foreach ($data as $t) {
            if ($t->jenis == 'masuk') {
                $saldo += $t->jumlah;
            } else {
                $saldo -= $t->jumlah;
            }
        }

        return view('index', compact('data', 'saldo'));
    }

    // halaman form
    public function create()
    {
        return view('create');
    }

    // simpan data
    public function store(Request $request)
    {
        // validasi biar aman
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required',
            'jumlah' => 'required|numeric',
            'jenis' => 'required|in:masuk,keluar'
        ]);

        Transaksi::create($request->all());

        return redirect('/transaksi')->with('success', 'Data berhasil ditambahkan');
    }

    // ❌ delete data
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect('/transaksi')->with('success', 'Data berhasil dihapus');
    }
}