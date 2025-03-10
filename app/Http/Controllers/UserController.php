<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'status' => 'required',
            'nama_ptgs' => 'required'
        ]);

        User::create($request->all());

        return redirect()->route('user.index')
                         ->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'status' => 'required',
            'nama_ptgs' => 'required'
        ]);

        $user->update($request->all());

        return redirect()->route('user.index')
                         ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')
                         ->with('success', 'User deleted successfully.');
    }
}
