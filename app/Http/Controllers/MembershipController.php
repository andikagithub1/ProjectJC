<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Membership;  // Pastikan menggunakan model yang benar

class MembershipController extends Controller
{

    public function create()
{
    return view('admin.membership.create');  // Pastikan file create.blade.php ada di resources/views/admin/membership/
}

    public function index()
    {
        $memberships = Membership::all();
        return view('admin.membership.index', compact('memberships'));  // Pastikan file view ada di resources/views/admin/membership/index.blade.php
    }

    public function edit($id)
    {
        $membership = Membership::findOrFail($id);
        return view('admin.membership.edit', compact('membership'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'membership_type' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $membership = Membership::findOrFail($id);
        $membership->update($request->only(['name', 'email', 'membership_type', 'status']));

        return redirect()->route('membership.index')->with('success', 'Membership updated successfully.');
    }

    public function destroy($id)
    {
        $membership = Membership::findOrFail($id);
        $membership->delete();

        return redirect()->route('membership.index')->with('success', 'Membership deleted successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'membership_type' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        Membership::create($request->all());

        return redirect()->route('membership.index')->with('success', 'Member added successfully.');
    }
}
