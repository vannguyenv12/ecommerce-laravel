<?php

// Set sidebar item active

use Illuminate\Support\Facades\Session;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

function setActive(array $route) {
    if (is_array($route)) {
        foreach($route as $r) {
            if (request()->routeIs($r)) {
                return 'active';
            }
        }
    }
}

// Check discount
function checkDiscount($product) {
    $currentDate = date('Y-m-d');

    if ($product->offer_price > 0 && $currentDate
        >= $product->offer_start_date &&
        $currentDate <= $product->offer_end_date) {
            return true;
        }

    return false;
}

// Calc discount percent
function calculateDiscountPercent($originalPrice, $discountPrice) {
    $discountAmount = $originalPrice - $discountPrice;
    $discountPercent = round(($discountAmount / $originalPrice) * 100);

    return $discountPercent;
}

// check product type
function productType($type):string {
    switch ($type) {
        case 'new_arrival':
            return 'New';
        case 'featured_product':
            return 'Featured';
        case 'top_product':
            return 'Top';
        case 'best_product':
            return 'Best';
        default:
            return '';

    }
}

// Get total amount
function getCartTotal() {
    $total = 0;

    foreach (\Cart::content() as $product) {
        $total += ($product->price + $product->options->variants_total) * $product->qty;
    }

    return $total;
}

// get payable total amount
function getMainCartTotal() {
    if (Session::has('coupon')) {
        $coupon = Session::get('coupon');
        $subTotal = getCartTotal();
        if ($coupon['discount_type'] === 'amount') {
            $total = $subTotal - $coupon['discount'];
            return $total;
        } elseif ($coupon['discount_type'] === 'percent') {
            $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
            $total = $subTotal - $discount;
            return $total;
        }
    } else {
        return getCartTotal();
    }
}

// get cart discount
function getCartDiscount() {
    if (Session::has('coupon')) {
        $coupon = Session::get('coupon');
        $subTotal = getCartTotal();
        if ($coupon['discount_type'] === 'amount') {
            return $coupon['discount'];
        } elseif ($coupon['discount_type'] === 'percent') {
            $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
            return $discount;
        }
    } else {
        return 0;
    }
}
