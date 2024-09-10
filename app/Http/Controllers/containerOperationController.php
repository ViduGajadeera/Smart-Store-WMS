<?php

namespace App\Http\Controllers;
use App\Models\manifestData;

use Illuminate\Http\Request;

class containerOperationController extends Controller
{
    public function getdata(){


        $query= manifestData::query();
        $query->where('status','not_arrived')->orwhere('permission', 'hold');
        $container= $query->select('containerNo','vesselName','type_of_container','status','permission')->distinct()->get();
        return view('US.containerOperation',compact('container'));


   
    }

    public function containerIn($containerNo){

        manifestData::where('containerNo', $containerNo)->update(['status' => 'arrived']);
        return redirect()->back()->with('success','Container In Successfully');
        

    }

    public function permission($containerNo){

        manifestData::where('containerNo', $containerNo)->update(['permission' => 'Granted']);
        return redirect()->back()->with('success','Permission Granted Successfully');
       

    }

}
