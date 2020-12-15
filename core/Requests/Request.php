<?php

namespace App\Core;

class Request
{


    protected $input;

    public function __construct($input)
    {
        $this->input = $input;
    }
    /**
     * Fetch the request URI.
     *
     * @return string
     */
    public static function uri()
    {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        );
    }

    /**
     * Fetch the request method.
     *
     * @return string
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
    public static function input()
    {
        $data =  array_merge($_POST, $_GET);
        return new self($data);
    }

    public function reqData($res)
    {
        return $this->input()->input[$res] ?? null;
    }
}