<?php
use App\Core\Request;
class RequestRequest extends Request
{
    public function __construct($request)
    {
        $this->input = $request->input();
    }
}
