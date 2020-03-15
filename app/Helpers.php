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
