<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\consigneeReg; 

class consigneeRegController extends Controller
{
    public function store(Request $request)
    {
       
        $request->validate([
            'first_name' =>'required|string|max:255',
            'last_name' =>'required|string|max:255',
            'email' =>'required|string|email|max:255|unique:consignee',
            'address' =>'required|string|max:255',
            'TIN' =>'required|string|max:255',
            'contact' =>'required|string|max:255',
            'BRno' =>'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);
 
       
        $consignee = consigneeReg::create([
            'fname' => $request->first_name,
            'lname' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'tinNumber' => $request->TIN,
            'contact' => $request->contact,
            'BRnumber' => $request->BRno,
            'password' => Hash::make($request->password),
        ]);
        
 
        return redirect()->route('Creg')->with('success', 'Consignee registered successfully.');
    }
}
