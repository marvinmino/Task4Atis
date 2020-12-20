<?php
use App\Core\Request;
class CommentRequest extends Request
{
    public function __construct($request)
    {
        $this->input = $request->input();
    }
}
