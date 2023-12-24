<?php

// Set sidebar item active
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
