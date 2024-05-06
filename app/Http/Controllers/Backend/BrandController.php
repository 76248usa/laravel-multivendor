<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    public function AllBrand(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_all', compact('brands'));
    }
    public function AddBrand(){
        return view('backend.brand.brand_add');
    }
  
    public function StoreBrand(Request $request){

        $request->validate([
        'brand_image' => 'required',
        'brand_name' => 'required',
    ]);

        $image = $request->file('brand_image');
        //@unlink(public_path('upload/brand/'.$data->photo));
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_slug' => strtolower(str_replace(' ', '-',$request->brand_name)),
            'brand_image' => $save_url, 
        ]);

       $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.brand')->with($notification); 
    }// End Method 

    public function EditBrand($id){
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brand'));
    }

    public function UpdateBrand(Request $request){
       $brand_id = $request->id;
       $old_image = $request->old_image;

       if(file_exists($old_image)){
        unlink($old_image);
       }

       if($request->file('brand_image')){
        $image = $request->file('brand_image');
        @unlink(public_path('upload/brand/'.$brand->photo));
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        Brand::findOrFail($brand_id)->update([
            'brand_name' => $request->brand_name,
            'brand_slug' => strtolower(str_replace(' ', '-',$request->brand_name)),
            'brand_image' => $save_url, 
        ]);

        $notification = array(
            'message' => 'Brand Name and Image Updated Successfully',
            'alert-type' => 'success'
        );

         return redirect()->route('all.brand')->with($notification); 


       } else {

         Brand::findOrFail($brand_id)->update([
            'brand_name' => $request->brand_name,
            'brand_slug' => strtolower(str_replace(' ', '-',$request->brand_name)),
             
        ]);

        $notification = array(
            'message' => 'Brand Name Updated Successfully',
            'alert-type' => 'success'
        );

         return redirect()->route('all.brand')->with($notification); 

       }       
    }

    public function DeleteBrand($id){
        $brand = Brand::findOrFail($id);
        $image = $brand->brand_image;
        unlink($image);

        $brand->delete();

         $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'success'
        );

         return redirect()->route('all.brand')->with($notification); 
    }

    }

