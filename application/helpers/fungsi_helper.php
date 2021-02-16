<?php

function check_already_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('user_id');
    if($user_session){
        redirect('dashboard');
    }
}


function check_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('user_id');
    if (!$user_session) {
        redirect('login');
    }
}

function indo_currency($value)
{
    return 'Rp. '.number_format($value,0,",",".");
}


function indo_date($date)
{
    $d = substr($date ,8,2);
    $m = substr($date ,5,2);
    $y = substr($date ,0,4);
    return $d. '/' .$m. '/' .$y;
}