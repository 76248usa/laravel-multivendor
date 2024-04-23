<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function VendorDashboard(){
        return view('vendor.index');
    }

    public function VendorLogin(){
        return view('vendor.vendor_login');
    }

    public function VendorProfile(){
        $id = Auth::user()->id;
        $vendor = User::find($id);
        return view('vendor.vendor_profile', compact('vendor'));
    }

    public function VendorChangePassword(Request $request){
       return view('vendor.vendor_change_password'); 
    }
    
public function VendorProfileStore(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address; 
        $data->vendor_join = $request->vendor_join; 
        $data->vendor_short_info = $request->vendor_short_info; 


        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/vendor_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/vendor_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Vendor Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method

public function VendorUpdatePassword(Request $request){
    $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        //match old password
        if(!Hash::check($request->old_password, Auth::user()->password)){
            return back()->with("error", "Old Password Doesn't Match");
        }
        //Update
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status","Password changed successfully");
}


    public function VendorDestroy(Request $request){

    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/vendor/login');
    }
    }
}
