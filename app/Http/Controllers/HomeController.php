<?php

namespace App\Http\Controllers;

use App\Models\ArmorSet;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Shows the home page.
     *
     * @return View
     */
    public function index(): View
    {
        $armorSets = ArmorSet::with([
            "armors.resources" => function ($query) {
                $query->orderBy("tier", "asc");
            },
        ])->get();

        return view("index", compact("armorSets"));
    }
}
