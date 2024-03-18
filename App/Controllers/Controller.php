<?php

namespace App\Controllers;

use App\Middleware\Auth;

class Controller
{


    private $self;
    private $middleware;
    private $method;
    public $except;
    private $only;



    public function middleware($middleware)
    {
        $this->self = new self;
        $this->self->middleware = $middleware; // auth
        $this->self->method = debug_backtrace()[3]['args'][1][1];
        return $this->self;
    }


    public function except($methods)
    {
        $this->except = $methods;
        return $this;
    }

    public function only(...$methods)
    {
        $this->only = $methods;
        return $this;
    }




    public function __destruct()
    {

        if (isset($this->except) && isset($this->only)) {
            exit;
        }

        if ($this->middleware == "auth") {
            $this->checkMiddleware("auth");
        } else if ($this->middleware == "guest") {

            $this->checkMiddleware("guest");

        } else {
            return null;
        }
    }


    private function checkMiddleware($middleFunction)
    {


        if (isset($this->except)) {
            if (is_array($this->except)) {
                if (!in_array($this->method, $this->except)) {
                    Auth::$middleFunction();
                }
            } else {
                $this->method == $this->except ?: Auth::$middleFunction();
            }
        } else if (isset($this->only)) {
            if (is_array($this->only)) {
                if (in_array($this->method, $this->only)) {
                    Auth::$middleFunction();
                }
            } else {
                $this->method == $this->only ? Auth::$middleFunction() : "";
            }
        } else {
            Auth::$middleFunction();
        }
    }
}
