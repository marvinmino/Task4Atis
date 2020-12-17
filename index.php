<?php
require 'vendor/autoload.php';
require 'core/bootstrap.php';
use App\Core\{Router, Request};
$a=explode('/',Request::uri());
if($a[0]=="post")
{   
    $r=Request::setUri();
    $_GET['slug']=$a[1];
}
Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method(), Request::input());