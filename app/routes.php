 <?php
//blog routes 
$router->get('articles'      , 'BlogController@home@@');
$router->get(''              , 'BlogController@home@@');
$router->get('register'      , 'BlogController@register@loggedIn@');
$router->get('logout'        , 'BlogController@logout@@');
$router->get('login'         , 'BlogController@login@loggedIn@');
$router->get('forgot'        , 'BlogController@forgotPassword@loggedIn@');
$router->get('error'         , 'BlogController@error@loggedIn@');
$router->get('create'        , 'BlogController@test@notLoggedIn@isWriter');
$router->get("sendmailverify", 'BlogController@sendmailverify@@');
//user routes
$router->get('sendmail'      , 'UsersController@sendMail@@');
$router->post('register'     , 'UsersController@save@loggedIn@');
$router->post('login'        , 'UsersController@login@loggedIn@');
$router->get('verify'        , 'UsersController@verify@@');
$router->post('forgot'       , 'UsersController@forgot@loggedIn@');
$router->get('reset'         , 'UsersController@resetLink@loggedIn@');
$router->post('reset'        , 'UsersController@reset@loggedIn@');
$router->get('dashboard'     , 'UsersController@show@notLoggedIn@isAdmin');
$router->get('acceptwriter'  , 'UsersController@acceptWriter@notLoggedIn@isAdmin');
$router->get('profile'       , 'UsersController@profile@notLoggedIn@');
//request routes
$router->get('makewriter'    , 'RequestController@admin@notLoggedIn@');
$router->get('reqDash'       , 'RequestController@getRequests@notLoggedIn@isAdmin');
$router->get('request'       , 'RequestController@reqLoad@notLoggedIn@isAdmin');
$router->get('postrequest'   , 'RequestController@post@notLoggedIn@isAdmin');
$router->get('requestHandler', 'RequestController@update@notLoggedIn@isAdmin');
//article routes
$router->get('acceptpost'    , 'ArticleController@acceptArticle@notLoggedIn@isAdmin');
$router->post('articlesave'  , 'ArticleController@save@notLoggedIn@isWriter');
$router->post('sort'         , 'ArticleController@sort@notLoggedIn@isAdmin');
$router->get('featured'      , 'ArticleController@featured@notLoggedIn@isAdmin');
$router->get("post"          , 'ArticleController@post@@');
$router->get("tags"          , 'ArticleController@tag@@');
$router->post("categorysel"  , 'ArticleController@select@@');
$router->get("allarticles"   , 'ArticleController@allarticles@@');
$router->get('home'          , 'ArticleController@show@@');
$router->get('myarticles'    , 'ArticleController@myArticles@notLoggedIn@isWriter');
//category routes
$router->get("category"      , 'CategoryController@show@notLoggedIn@isAdmin');
$router->post("category"     , 'CategoryController@save@notLoggedIn@isAdmin');
$router->post("editCategory" , 'CategoryController@update@notLoggedIn@isAdmin');
//comment routes
$router->post("editComment"  , 'CommentController@update@notLoggedIn@');
$router->post("deleteComment", 'CommentController@delete@notLoggedIn@');
$router->post("comment"      , 'CommentController@save@notLoggedIn@');
$router->get('acceptcomment' , 'CommentController@acceptComment@notLoggedIn@isAdmin');