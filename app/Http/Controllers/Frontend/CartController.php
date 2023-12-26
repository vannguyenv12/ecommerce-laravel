<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function cartDetails()
    {
        $cartItems = Cart::content();
        if (count($cartItems) === 0) {
            toastr('Cart is empty', 'warning', 'Waring');
            return redirect()->route('home');
        }
        return view('frontend.pages.cart-detail', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        // Check quantity product in db
        if ($product->qty == 0) {
            return response(['status' => 'error', 'message' => 'Product stock out']);
        } else if ($product->qty < $request->qty) {
            return response(['status' => 'error', 'message' => 'Quantity not available in out stock']);

        }

        $variants = [];
        $variantTotalAmount = 0;

        if ($request->has('variants_items')) {
            foreach ($request->variants_items as $item_id) {
                $variantItem = ProductVariantItem::find($item_id);
                $variants[$variantItem->productVariant->name]['name'] = $variantItem->name;
                $variants[$variantItem->productVariant->name]['price'] = $variantItem->price;
                $variantTotalAmount += $variantItem->price;
            }
        }


        // Discount total
        $productPrice = 0;
        if (checkDiscount($product)) {
            $productPrice = $product->offer_price;
        } else {
            $productPrice = $product->price;

        }

        $cartData = [];
        $cartData['id'] = $product->id;
        $cartData['name'] = $product->name;
        $cartData['qty'] = $request->qty;
        $cartData['price'] = $productPrice;
        $cartData['weight'] = 10;
        $cartData['options']['variants'] = $variants;
        $cartData['options']['variants_total'] = $variantTotalAmount;
        $cartData['options']['image'] = $product->thumb_image;
        $cartData['options']['slug'] = $product->slug;

        Cart::add($cartData);

        return response(['status' => 'success', 'message' => 'Added to cart successfully!']);
    }


    public function updateProductQty(Request $request)
    {
        $productId = Cart::get($request->rowId)->id;
        $product = Product::findOrFail($productId);

        // Check quantity product in db
        if ($product->qty == 0) {
            return response(['status' => 'error', 'message' => 'Product stock out']);
        } else if ($product->qty < $request->quantity) {
            return response(['status' => 'error', 'message' => 'Quantity not available in out stock']);

        }
        Cart::update($request->rowId,  $request->quantity);
        $productTotal = $this->getProductTotal($request->rowId);

        return response(['status' => 'success', 'message' => 'Product Quantity Updated!', 'product_total' => $productTotal]);
    }

    public function getProductTotal($rowId)
    {
        $product = Cart::get($rowId);
        $total = ($product->price + $product->options->variants_total) * $product->qty;

        return $total;
    }

    public function cartTotal()
    {
        $total = 0;

        foreach (Cart::content() as $product) {
            $total += $this->getProductTotal($product->rowId);
        }

        return $total;
    }

    public function clearCart()
    {
        Cart::destroy();

        return response(['status' => 'success', 'message' => 'Cart cleared successfully!']);
    }

    public function removeProduct($rowId)
    {
        Cart::remove($rowId);
        toastr('Product has been removed', 'success', 'Success');
        return redirect()->back();
    }

    public function getCartCount()
    {
        return Cart::content()->count();
    }

    public function getCartProducts()
    {
        return Cart::content();
    }

    public function removeSidebarProduct(Request $request)
    {
        Cart::remove($request->rowId);

        return response(['status' => 'success', 'message' => 'Product removed successfully!']);
    }
}
