<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Epi;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    public function index()
    {
        $epis = Epi::all()->sortBy('id');

        return view('estoque.index', compact('epis'));
    }
}
