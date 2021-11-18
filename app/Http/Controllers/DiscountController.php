<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;

class DiscountController extends Controller
{
    public function store(Request $request){
        $data = $this->validate($request,[
            'update' => 'required',
            'discount' => 'required',

            ]);
            
        if($data['update'] == 1){
            $old = Discount::where('status',1)->first();      
            $old->update([
                'percent' => $data['discount'] 
                ]);
            
        }elseif($data['update'] == 0){
            Discount::create([
                'percent' => $data['discount'] 
                ]);
        }
        
        return back()->with('success','Discount updated successfully!!');
    }
}
