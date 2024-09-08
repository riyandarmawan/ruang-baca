<?php

if (!function_exists('formatNoTelp')) {
    function formatNoTelp($no_telp)
    {
        return rtrim(chunk_split($no_telp, 4, '-'), '-');
    }
}
