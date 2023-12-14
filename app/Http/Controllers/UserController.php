<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {

    // }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {

    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {

    // }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $post = $user->post()->latest()->paginate(3);
        return view('user.show', compact('user', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $post = $user->post()->latest()->paginate(3);
        $editing = true;
        return view('user.edit', compact('user', 'editing', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $this->authorize('update', $user);

        $validated = request()->validate(
            [
                'name' => 'required|min:5|max:40',
                'bio' => 'nullable|min:1|max:255',
                'image' => 'image',

            ]
        );

        if (request()->has('image')) {

            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;

            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
        }

        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profile Updated Success !');
    }

    public function profile()
    {
        return $this->show(auth()->user());
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {

    // }
}
