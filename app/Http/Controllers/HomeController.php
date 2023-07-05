<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Shows the home page.
     *
     * @return View
     */
    public function index(): View
    {
        return view("index");
    }
}
