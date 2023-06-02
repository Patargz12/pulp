<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::with('user')->get();
        return view('admin.admin.index', [
            'admins' => $admins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user, Admin $admin)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'contact_number' => 'required|string|regex:/^[0-9]+$/|max:11',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'birthday' => 'required|date_format:Y-m-d',
            'gender' => 'required|in:male,female,nonbinary,transgender',
            'address' => 'required',
        ]);

        $user->fill([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'contact_number' => $validatedData['contact_number'],
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
        ])->save();
        $user->assignRole('admin');

        $admin->fill([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'birthday' => $validatedData['birthday'],
            'gender' => $validatedData['gender'],
            'contact_number' => $validatedData['contact_number'],
            'address' => $validatedData['address'],
            'user_id' => $user->id,
        ])->save();

        return redirect()->route('admin.admins.index')->with('success', "Doctor added successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = Admin::with('user')->findOrFail($id);
        return view('admin.admin.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Admin::with('user')->findOrFail($id);
        return view('admin.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($admin->user->id),
            ],
            'contact_number' => 'required|string|max:20',
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($admin->user->id),
            ],
            'birthday' => 'required|date_format:Y-m-d',
            'gender' => 'required|string',
            'address' => 'required',
            'avatar' => 'file',
        ]);

        $userData = [
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'contact_number' => $validatedData['contact_number'],
            'username' => $validatedData['username'],
        ];

        // Check if a new avatar was uploaded
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->store('avatars', 'public');
            $userData['avatar'] = $avatarPath;
        }

        $admin->user->update($userData);

        $adminData = [
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'birthday' => $validatedData['birthday'],
            'gender' => $validatedData['gender'],
            'contact_number' => $validatedData['contact_number'],
            'address' => $validatedData['address'],
        ];

        $admin->update($adminData);

        if ($admin->wasChanged() || $admin->user->wasChanged()) {
            return redirect()->route('admin.admins.index')->with('success', 'Admin updated successfully.');
        } elseif (!$admin->wasChanged() || !$admin->user->wasChanged()) {
            return back()->with('info', 'Nothing has changed.');
        } else {
            return back()->with('danger', 'Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
