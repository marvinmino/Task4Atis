 <?php

$router->get('home', 'BlogController@home@@');
$router->get('logout', 'UsersController@logout');
$router->get('', 'BlogController@home@@');
$router->get('register', 'BlogController@register@loggedIn@');
$router->post('register', 'UsersController@store@loggedIn@');
$router->get('login', 'BlogController@login@loggedIn@');
$router->post('login', 'UsersController@login@loggedIn@');
$router->get('logout', 'BlogController@logout@@');
$router->get('verify','UsersController@verify@@');
$router->get('articles','ArticleController@home@@');
$router->get('forgot','BlogController@forgotPassword@loggedIn@');
$router->post('forgot','UsersController@forgot@loggedIn@');
$router->get('reset','UsersController@resetLink@loggedIn@');
$router->post('reset','UsersController@reset@loggedIn@');
$router->get('dashboard','AdminController@dashboard@notLoggedIn@isAdmin');
$router->get('error','BlogController@error@loggedIn@');
$router->get('profile','UsersController@profile@notLoggedIn@');
$router->get('makewriter','RequestController@admin@notLoggedIn@');
$router->get('reqDash','RequestController@getRequests@notLoggedIn@isAdmin');
$router->get('request','RequestController@reqLoad@notLoggedIn@isAdmin');