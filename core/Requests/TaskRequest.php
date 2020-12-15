<?php
use App\Core\Request;
class TaskRequest extends Request
{
    public function __construct($request)
    {
        $this->input = $request->input();
    }

    public function taskAuth()
    {
        if (empty($this->reqData('taskName'))) {
            session_start();
            $_SESSION['error'] = "Task name not set";

        }
        if (empty($this->reqData('taskDescription'))) {
            session_start();
            $_SESSION['error'] = "Task description not set";

        }
        if (empty($this->reqData('taskPriority'))) {
            session_start();
            $_SESSION['error'] = "Task priority not set";

        }
        if ($this->reqData('taskDeadline')) {
            if (strtotime($this->reqData('taskDeadline'))<=strtotime(date("Y-m-d"))) {
                session_start();
                $_SESSION['error'] = "Deadline can not be before the start date";
            }
        } else {
            session_start();
            $_SESSION['error'] = "Task deadline not set";

        }
    }
}
