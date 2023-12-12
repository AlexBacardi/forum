<?php

if(!function_exists('status')) {

    function status($date): bool
    {
        if(is_null($date) || now()->gte($date)) {

            return true;
        }

        return false;
    }
}
