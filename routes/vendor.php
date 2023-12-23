<?php

use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProductImageGalleryController;
use App\Http\Controllers\Backend\VendorProductVariantController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopProfileController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [VendorProfileController::class, 'index'])->name('profile');
Route::put('profile', [VendorProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile', [VendorProfileController::class, 'updatePassword'])->name('profile.update.password');

// Vendor Shop Profile
Route::resource('shop-profile', VendorShopProfileController::class);
// Product
Route::get('product/get-sub-categories', [VendorProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-child-categories', [VendorProductController::class, 'getChildCategories'])->name('product.get-childcategories');
Route::resource('products', VendorProductController::class);

// Product Image Gallery
Route::resource('products-image-gallery', VendorProductImageGalleryController::class);

// Product Variant
Route::put('products-variant/change-status', [VendorProductVariantController::class, 'changeStatus'])->name('products-variant.change-status');
Route::resource('products-variant', VendorProductVariantController::class);
// Product Variant Item
// Route::get('products-variant-item/{productId}/{variantId}', [ProductVariantItemController::class, 'index'])->name('products-variant-item.index');
// Route::get('products-variant-item/create/{productId}/{variantId}', [ProductVariantItemController::class, 'create'])->name('products-variant-item.create');
// Route::post('products-variant-item', [ProductVariantItemController::class, 'store'])->name('products-variant-item.store');
// Route::get('products-variant-item-edit/{variantItemId}', [ProductVariantItemController::class, 'edit'])->name('products-variant-item.edit');
// Route::put('products-variant-item-update/{variantItemId}', [ProductVariantItemController::class, 'update'])->name('products-variant-item.update');
// Route::delete('products-variant-item/{variantItemId}', [ProductVariantItemController::class, 'destroy'])->name('products-variant-item.destroy');
// Route::put('products-variant-item-status', [ProductVariantItemController::class, 'changeStatus'])->name('products-variant-item.change-status');

