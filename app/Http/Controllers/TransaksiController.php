<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = Transaksi::all();

        $saldo = 0;
        foreach ($data as $t) {
            if ($t->jenis == 'masuk') {
                $saldo += $t->jumlah;
            } else {
                $saldo -= $t->jumlah;
            }
        }

        return view('index', compact('data','saldo'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        Transaksi::create($request->all());
        return redirect('/transaksi');
    }
}