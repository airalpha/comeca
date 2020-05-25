<?php

    if(!function_exists('getPrice')) {
        function getPrice($priceInDecimal) {
            $price = floatval($priceInDecimal);
            return number_format($price, 2, ',', ' ');
        }
    }

    if(!function_exists('getPriceQty')) {
        function getPriceQty($price, $qte) {
            $price = floatval($price);
            $qte = intval($qte);
            return getPrice($price * $qte);
        }
    }

    if(!function_exists('getDiscountTotalPrice')) {
        function getDiscountTotalPrice($subtotalPrice, $remise) {
            return getDiscountSubTotalPrice($subtotalPrice, $remise) + getDiscountTax($subtotalPrice, $remise);
        }
    }

    if(!function_exists('getDiscountSubTotalPrice')) {
        function getDiscountSubTotalPrice($subtotalPrice, $remise) {
            $subtotal = $subtotalPrice - $remise;
            return $subtotal;
        }
    }

    if(!function_exists('getDiscountTax')) {
        function getDiscountTax($subtotalPrice, $remise) {
            $tax = (getDiscountSubTotalPrice($subtotalPrice, $remise) * config('cart.tax'))/100;
            return $tax;
        }
    }

    if (!function_exists('checkSession')) {
        function checkSession() {
            return request()->session()->has('discount');
        }
    }
