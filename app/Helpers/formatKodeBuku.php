<?php

if (!function_exists('formatKodeBuku')) {
    function formatKodeBuku($number)
    {
        return preg_replace("/^(\d{3})(\d{3})(\d{2})(\d{4})(\d{1})$/", "$1-$2-$3-$4-$5", $number);
    }
}
