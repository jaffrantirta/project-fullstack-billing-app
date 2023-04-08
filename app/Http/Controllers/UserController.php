<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->validated());
        $user->assignRole('provider');
        return back();
    }
    public function show(User $user)
    {
        //
    }
    public function edit(User $user)
    {
        //
    }
    public function update(Request $request, User $user)
    {
        //
    }
    public function destroy(User $user)
    {
        //
    }
}
