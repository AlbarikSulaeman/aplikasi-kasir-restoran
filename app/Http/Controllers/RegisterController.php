<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
 
    public function index()
    {
        $user = User::latest()->paginate(5);
    
        if (Auth::check()) {
            $cek = Auth::user()->role;
            if ($cek == 'admin') {
                return view('admin.index',compact('user'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
            }
            return redirect('/menu');
        } 

        return redirect('/login');
    }
    
    public function create()
    {
        if (Auth::check()) {
            $cek = Auth::user()->role;
            if ($cek == 'admin') {
                return view('admin.register');
            }
            return redirect('/register');
        } 
        return redirect('/login');
    }

    public function store(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required',
            'username' => ['required', 'unique:users'],
            'password' => 'required',
            'role' => 'required',
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        return redirect('/register')->with('success', 'Registrasi berhasil!');
    }

    public function edit(User $user)
    {
        if (Auth::check()) {
            $cek = Auth::user()->role;
            if ($cek == 'admin') {
            return view('admin.edit', compact('user'));
            }
            return redirect('/register');
        }
        return redirect('/login');
    }

    public function update(Request $request, User $user)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'username' => ['required', 'unique:users'],
            'password' => 'required',
            'role' => 'required',
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
        $user->update($validateData);

        return redirect()->route('register.index')
        ->with('success', 'Berhasil Update !');
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('register.index')
                        ->with('success','Berhasil Hapus !');
    }
}
