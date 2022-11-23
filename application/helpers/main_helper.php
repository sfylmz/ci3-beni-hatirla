<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Main Helpers
 *
 * @category	Helpers
 * @author		Sefa Yilmaz
 */

// ------------------------------------------------------------------------

function getActiveUser()
{
    $x = &get_instance();
    $x->load->model('user_model');
    $activeUser   = $x->user_model->getData(array("isActive" => 1));
    return $activeUser;
}

function activeUser()
{
    $x              = &get_instance();
    $currentUser    = $x->session->userdata('user');
    if($currentUser)
        return $currentUser;
    else
        return false;
}

function getUserRoles()
{
    $x              = &get_instance();
    return $x->session->userdata("user_roles");
}

function setUserRoles()
{
    $x              = &get_instance();
    $x->load->model("userroles_model");
    $user_roles     = $x->userroles_model->getAll(array("is_active" => "on"));
    $roles = [];
    foreach ($user_roles as $role)
    {
        $roles[$role->role_name] = $role->roles;
    }
    $x->session->set_userdata("user_roles", $roles);
}

function chiperEncode($vdata)
{
    $data       = $vdata;
    $chiper     = 'AES-128-ECB';
    $key        = 'CodeigniterRandom';
    $encoded    = openssl_encrypt($data, $chiper, $key);
    return $encoded;
}

function chiperDecode($vdata)
{
    $data       = $vdata;
    $chiper     = 'AES-128-ECB';
    $key        = 'CodeigniterRandom';
    $decoded    = openssl_decrypt($data, $chiper, $key);
    return $decoded;
}