<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;


class PageController extends Controller {
    public function homepage() {
        return view("homepage");
    }
}