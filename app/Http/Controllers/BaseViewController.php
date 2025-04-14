<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseViewController extends Controller
{
    protected $viewName;

    public function __construct($viewName = null)
    {
        $this->viewName = $viewName;
    }

    public function index()
    {
        return view($this->viewName);
    }
}
