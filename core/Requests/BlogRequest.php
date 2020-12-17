<?php
use App\Core\Request;
class BlogRequest extends Request
{
    public function __construct($request)
    {
        $this->input = $request->input();
    }
}
