<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    
        if (Auth::check()) {
             $cek = Auth::user()->role;
             if ($cek == 'manajer') {
                $transaksi = Transaksi::latest()->paginate(10);
                return view('manajer.laporan',compact('transaksi'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
            }
            if (Auth::check()) {
                $cek = Auth::user()->role;
                if ($cek == 'kasir') {
                $transaksi = Transaksi::latest()->paginate(5);
                    return view('kasir.index',compact('transaksi'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
                }
            }
            return redirect('/register');
        } 

        return redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::all();
        $user = User::where('name')->first();

        if (Auth::check()) {
            $cek = Auth::user()->role;
            if ($cek == 'kasir') {
            return view('kasir.create', compact('menu', 'user', $menu, $user));
            }
            return redirect('/transaksi');
        }
        return redirect('/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'nama_menu' => 'required',
            'jumlah' => 'required',
            'total_harga' => 'required',
            'nama_pegawai' => 'required'
        ]);
    
        Transaksi::create($request->all());
     
        return redirect()->route('transaksi.index')
                        ->with('success','Berhasil Menyimpan !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $menu = Menu::all();
        $user = User::all();

        if (Auth::check()) {
            $cek = Auth::user()->role;
            if ($cek == 'kasir') {
            return view('kasir.edit', compact('transaksi', 'menu', 'user'));
            }
            return redirect('/transaksi');
        }
            return redirect('/login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'nama_menu' => 'required',
            'jumlah' => 'required',
            'total_harga' => 'required',
            'nama_pegawai' => 'required'
        ]);

        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')
        ->with('success', 'Berhasil Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
     
        return redirect()->route('transaksi.index')
                        ->with('success','Berhasil Hapus !');
    }
}
