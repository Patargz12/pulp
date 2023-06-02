<?php

namespace App\Http\Controllers\Patient;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function edit(string $id)
    {
        $user = User::with('patient')->findOrFail($id);
        return view('patient.users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'contact_number' => 'required|string|max:20',
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($user->id),
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

        $user->update($userData);

        $patientData = [
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'birthday' => $validatedData['birthday'],
            'gender' => $validatedData['gender'],
            'contact_number' => $validatedData['contact_number'],
            'address' => $validatedData['address'],
        ];

        $user->patient->update($patientData);

        if ($user->wasChanged() || $user->wasChanged()) {
            return redirect()->route('patient.profile')->with('success', 'Profile updated successfully.');
        } elseif (!$user->wasChanged() || !$user->user->wasChanged()) {
            return back()->with('info', 'Nothing has changed.');
        } else {
            return back()->with('danger', 'Something went wrong.');
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        Session::flush();

        return redirect()->route('home')->with('success', 'User deleted successfully.');
    }
}
