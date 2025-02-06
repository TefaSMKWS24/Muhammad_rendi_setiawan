<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\facedas\DB;
use Illuminate\Support\facedas\Redirect;
use Illuminate\Support\facedas\Validator;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // return view =('transaksi.index')
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // return view =('transaksi.create')
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaksi = DB::table('transaksi')->where('kode_transaksi', $id)->first();
        return view('transaksi.edit', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = DB::table('transaksi')->where('id', $id)->first();
        return view('transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_transaksi' => 'required',
            'tanggal_transaksi' => 'required',
            'kode_kasir' => 'required',
            'kode_barang' => 'required',
            'kode_pelanggan' => 'required',
            'total_belanja' => 'required',
            'total' => 'required',
        ]);

        $datatransaksi = ([
            'kode_transaksi' => $request->kode_transaksi,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'kode_kasir' => $request->kode_kasir,
            'kode_barang' => $request->kode_barang,
            'kode_pelanggan' => $request->kode_pelanggan,
            'total_belanja' => $request->total_belanja,
            'total' => $request->total,
        ]);

        $datadetail = [
            'kode_transaksi' => $request->kode_transaksi,
            'kode_barang' => $request->kode_barang,
            'jumlah' => $request->qty,
            'total' => $request->total,
        ];

        DB::table('transaksi')->insert($data);
        DB::table('detail_transaksi')->insert($data);
        return redirect()->route('transaksi.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('transaksi')->where('kode_transaksi', $id)->delete();
        return redirect()-view('transaksi.index');
    }
}
