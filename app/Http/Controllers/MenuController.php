<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::latest()->paginate(5);
    
        if (Auth::check()) {
            $cek = Auth::user()->role;
             if ($cek == 'manajer') {
                return view('manajer.index',compact('menu'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
             }
             return redirect('/transaksi');
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
        if (Auth::check()) {
            $cek = Auth::user()->role;
             if ($cek == 'manajer') {
            return view('manajer.create');
            }
            return redirect('/menu');
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
            'nama_menu' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'ketersediaan' => 'required'
        ]);
    
        Menu::create($request->all());
     
        return redirect()->route('menu.index')
                        ->with('success','Berhasil Menyimpan !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        if (Auth::check()) {
            $cek = Auth::user()->role;
             if ($cek == 'manajer') {
            return view('manajer.edit', compact('menu'));
            }
            return redirect('/login');
        }
            return redirect('/login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'ketersediaan' => 'required'
        ]);

        $menu->update($request->all());

        return redirect()->route('menu.index')
        ->with('success', 'Berhasil Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
     
        return redirect()->route('menu.index')
                        ->with('success','Berhasil Hapus !');
    }
}
