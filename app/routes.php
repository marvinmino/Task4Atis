 <?php

$router->get('articles', 'BlogController@home@@');
$router->get('logout', 'UsersController@logout');
$router->get('sendmail', 'UsersController@sendMail@@');
$router->get('', 'BlogController@home@@');
$router->get('register', 'BlogController@register@loggedIn@');
$router->post('register', 'UsersController@store@loggedIn@');
$router->get('login', 'BlogController@login@loggedIn@');
$router->post('login', 'UsersController@login@loggedIn@');
$router->get('logout', 'BlogController@logout@@');
$router->get('verify','UsersController@verify@@');
$router->get('home','ArticleController@home@@');
$router->get('myarticles','ArticleController@myArticles@notLoggedIn@isWriter');
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
$router->get('postrequest','RequestController@post@notLoggedIn@isAdmin');
$router->get('requestHandler','RequestController@requestHandler@notLoggedIn@isAdmin');
$router->get('acceptwriter','UsersController@acceptWriter@notLoggedIn@isAdmin');
$router->get('acceptpost','ArticleController@acceptArticle@notLoggedIn@isAdmin');
$router->get('acceptcomment','CommentController@acceptComment@notLoggedIn@isAdmin');
$router->get('create','BlogController@test@notLoggedIn@isWriter');
$router->get("post",'BlogController@post@@');
$router->get("tags",'ArticleController@tag@@');
$router->get("sendmailverify",'BlogController@sendmailverify@@');
$router->get("category",'CategoryController@show@notLoggedIn@isAdmin');
$router->post("category",'CategoryController@save@notLoggedIn@isAdmin');
$router->post("editCategory",'CategoryController@edit@notLoggedIn@isAdmin');
$router->post("editComment",'CommentController@edit@notLoggedIn@');
$router->post("deleteComment",'CommentController@delete@notLoggedIn@');
$router->post("comment",'CommentController@save@notLoggedIn@');
$router->post('articlesave','ArticleController@save@notLoggedIn@isWriter');
