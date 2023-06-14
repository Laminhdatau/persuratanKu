<?php

if (!function_exists('who_is')) {
    function who_is()
    {
        $session = \Config\Services::session();
        return $session->get('email');
    }
}
