<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;


Route::get('/', function () {
    return view('frontend.index');
});

Route::middleware(['auth'])->group(function() {
Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');
Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
Route::post('user/update/password', [UserController::class, 'UserUpdatePassword'])
    ->name('user.update.password');
}); 


Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
Route::get('vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';

//ADMIN
Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])
    ->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])
    ->name('admin.change.password');
    Route::post('admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');
});
//VENDOR
Route::middleware(['auth','role:vendor'])->group(function(){
    Route::get('vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashboard');
    Route::get('/vendor/logout', [VendorController::class, 'VendorDestroy'])->name('vendor.logout');
    Route::get('/vendor/profile', [VendorController::class, 'VendorProfile'])->name('vendor.profile');
    Route::post('/vendor/profile/store', [VendorController::class, 'VendorProfileStore'])
    ->name('vendor.profile.store');
    Route::get('vendor/change/password', [VendorController::class, 'VendorChangePassword'])
    ->name('vendor.change.password');
    Route::post('vendor/update/password', [VendorController::class, 'VendorUpdatePassword'])
    ->name('update.password');
});
Route::get('/admin/login', [AdminController::class, 'AdminLogin']);
Route::get('/vendor/login', [VendorController::class, 'VendorLogin'])->name('vendor.login');
Route::get('become/vendor', [VendorController::class, 'BecomeVendor'])->name('become.vendor');
Route::post('vendor/register', [VendorController::class, 'RegisterVendor'])->name('vendor.register');




//BRAND
Route::middleware(['auth', 'role:admin'])->group(function(){
Route::controller(BrandController::class)->group(function(){
    Route::get('/all/brand', 'AllBrand')->name('all.brand');
    Route::get('/add/brand', 'AddBrand')->name('add.brand');
    Route::post('/brand/store', 'StoreBrand')->name('brand.store');
    Route::get('/edit/brand/{id}', 'EditBrand')->name('edit.brand');
    Route::post('/update/brand', 'UpdateBrand')->name('update.brand');
    Route::get('/delete/brand/{id}', 'DeleteBrand')->name('delete.brand');
});
}); //End Middleware

//Category
Route::middleware(['auth', 'role:admin'])->group(function(){
Route::controller(CategoryController::class)->group(function(){
    Route::get('/all/category', 'AllCategories')->name('all.category');
    Route::get('/add/category', 'AddCategory')->name('add.category');
    Route::post('/category/store', 'StoreCategory')->name('category.store');
    Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');
    Route::post('/update/category', 'UpdateCategory')->name('update.category');
    Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');
    Route::get('/category/subcategories/{id}', 'ShowSubcategories')->name('category.subcategories');
});
}); //End Middleware

//SubCategory
Route::middleware(['auth', 'role:admin'])->group(function(){
Route::controller(SubCategoryController::class)->group(function(){
    Route::get('/all/subcategory', 'AllSubCategory')->name('all.subcategory');
    Route::get('/add/subcategory', 'AddSubCategory')->name('add.subcategory');
    Route::post('/subcategory/store', 'StoreSubCategory')->name('subcategory.store');
    Route::get('/edit/subcategory/{id}', 'EditSubCategory')->name('edit.subcategory');
    Route::post('/update/subcategory/{id}', 'UpdateSubcategory')->name('update.subcategory');
    Route::get('/delete/subcategory/{id}', 'DeleteSubcategory')->name('delete.subcategory');
});
}); 

//Vendor Active/Inactive

Route::controller(VendorController::class)->group(function(){
    Route::get('/inactive/vendor', 'InactiveVendor')->name('inactive.vendor');
    Route::get('/active/vendor', 'ActiveVendor')->name('active.vendor');
    Route::get('/inactive/vendor/details/{id}', 'InactiveVendorDetails')->name('inactive.vendor.details');   
    Route::post('/active/vendor/approve' , 'ActiveVendorApprove')->name('active.vendor.approve'); 
    Route::get('/active/vendor/details/{id}', 'ActiveVendorDetails')->name('active.vendor.details');
    Route::post('/deactivate/vendor/approve' , 'DeactivateVendorApprove')->name('deactivate.vendor.approve');

});




