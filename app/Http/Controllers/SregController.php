<?php

namespace App\Http\Controllers;

use App\Models\StaffMember;
use Illuminate\Http\Request;

class SregController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:staff_member,email',
            'password' => 'required|min:6',
            'address' => 'required',
            'contact' => 'required',
            'NIC' => 'required',
            'Role' => 'required',
        ]);

        
        StaffMember::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password), 
            'address' => $request->address,
            'contact' => $request->contact,
            'NIC' => $request->NIC,
            'Role' => $request->Role,
        ]);

        return redirect()->route('sreg')->with('success', 'Staff member registered successfully.');
    }
}
