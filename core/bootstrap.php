<?php

use App\Core\App;
use App\Core\Repository\{RepositoryBuilder, Connection,UserRepository,RequestRepository};

App::bind('config', require 'config.php');
App::bind('key', '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');
App::bind('userQuery', new UserRepository(
    Connection::make(App::get('config')['database'])
));
App::bind('requestQuery', new RequestRepository(
    Connection::make(App::get('config')['database'])
));