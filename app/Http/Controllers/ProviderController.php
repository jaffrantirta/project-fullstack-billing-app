<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderStoreRequest;
use App\Http\Requests\ProviderUpdateRequest;
use App\Models\Category;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ProviderController extends Controller
{
    public function index(Request $request)
    {
        $providers = Provider::with('user')->with('category')->latest();

        if ($request->has('search')) {
            $search = $request->input('search');
            $providers->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('category', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        $providers = $providers->paginate();

        return Inertia::render('Provider/Index', [
            'session' => session()->all(),
            'providers' => $providers,
        ]);
    }
    public function create()
    {
        return Inertia::render('Provider/CreateOrUpdate', [
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
    public function edit(Provider $provider)
    {
        $this->authorize('view-provider', $provider);
        return Inertia::render('Provider/CreateOrUpdate', [
            'session' => session()->all(),
            'categories' => Category::orderBy('name')->get(),
            'provider' => Provider::with('category')->with('user')->findOrFail($provider->id),
            'isUpdate' => true,
        ]);
    }
    public function update(ProviderUpdateRequest $request, Provider $provider)
    {
        DB::beginTransaction();
        $provider->user->update($request->only('email', 'name'));
        $provider->update($request->only('name', 'address', 'category_id'));
        DB::commit();
        return back();
    }
    public function destroy(Provider $provider)
    {
        $this->authorize('delete-provider', $provider);
        DB::transaction(function () use ($provider) {
            $provider->user->delete();
            $provider->delete();
        });
        return back();
    }
}
