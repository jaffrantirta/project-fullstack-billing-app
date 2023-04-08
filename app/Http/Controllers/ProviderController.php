<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderStoreRequest;
use App\Models\Category;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProviderController extends Controller
{
    public function index()
    {
        return Inertia::render('Provider/Index', [
            'providers' => Provider::with('user')->with('category')->latest()->paginate(),
            'session' => session()->all(),
        ]);
    }
    public function create()
    {
        return Inertia::render('Provider/Create', [
            'session' => session()->all(),
            'categories' => Category::orderBy('name')->get(),
        ]);
    }
    public function store(ProviderStoreRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        Provider::create($request->merge(['user_id' => $user->id])->except(['email']));
        return back();
    }
    public function show(Provider $provider)
    {
        //
    }
    public function edit(Provider $provider)
    {
        //
    }
    public function update(Request $request, Provider $provider)
    {
        //
    }
    public function destroy(Provider $provider)
    {
        //
    }
}
