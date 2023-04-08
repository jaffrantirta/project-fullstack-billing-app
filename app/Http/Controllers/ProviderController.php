<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderStoreRequest;
use App\Models\Category;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        DB::beginTransaction();
        $user = User::create($request->only('email', 'name', 'password'));
        $user->provider()->create($request->only('name', 'address', 'category_id'));
        $user->assignRole('provider');
        DB::commit();
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
