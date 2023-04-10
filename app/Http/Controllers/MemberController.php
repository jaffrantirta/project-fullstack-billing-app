<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $members = Member::where('provider_id', auth()->user()->provider->id)->latest();

        if ($request->has('search')) {
            $search = $request->input('search');
            $members->where(function ($query) use ($search) {
                $query->where('account_number', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%');
            });
        }

        $members = $members->paginate();

        return Inertia::render('Member/Index', [
            'session' => session()->all(),
            'members' => $members,
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
    public function show(Member $member)
    {
        //
    }
    public function edit(Member $member)
    {
        //
    }
    public function update(Request $request, Member $member)
    {
        //
    }
    public function destroy(Member $member)
    {
        //
    }
}
