<?php

namespace App\Http\Controllers;

use App\Models\Block;
use Illuminate\Http\Request;

class ExplorerController extends Controller
{
    public function index()
    {
        $blocks = Block::orderBy('block_index', 'desc')->get();
        return view('explorer', compact('blocks'));
    }
}
