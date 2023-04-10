<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $packages = Package::where('provider_id', auth()->user()->provider->id)->latest();

        if ($request->has('search')) {
            $search = $request->input('search');
            $packages->where(function ($query) use ($search) {
                $query->where('description', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%')
                    ->orWhere('fee', 'like', '%' . $search . '%')
                    ->orWhere('frequency', 'like', '%' . $search . '%')
                    ->orWhere('billing_day', 'like', '%' . $search . '%');
            });
        }

        $packages = $packages->paginate();

        return Inertia::render('Package/Index', [
            'session' => session()->all(),
            'packages' => $packages,
        ]);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Package $package)
    {
        //
    }
    public function edit(Package $package)
    {
        //
    }
    public function update(Request $request, Package $package)
    {
        //
    }
    public function destroy(Package $package)
    {
        //
    }
}
