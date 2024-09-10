<?php
namespace App\Http\Controllers;

use App\Models\StaffMember;
use Illuminate\Http\Request;

class StaffAllocationController extends Controller
{
    public function showstaff(Request $request)
    { 
       

        $query= StaffMember::query();
        if($request->has('role') && $request->role !=''){
            $query->where('Role', $request->role);
        }

      
        $staff =    $query->select('first_name', 'last_name', 'Role','daily_allocation','id')->get();
        return view('US.US-layout.staffAllocation', compact('staff'));
    }


    public function allocate($id){

        $member = StaffMember::findorFail($id);

        $member->daily_allocation = 1;
        $member->save();

        return redirect()->back()->with('success', 'Staff Member Allocated Successfully');
    }
 
    public function deallocate($id){
        $member = StaffMember::findorFail($id);

        $member->daily_allocation = 0;
        $member->save();

        return redirect()->back()->with('success', 'Staff Member Deallocated Successfully');
    }

    
}
