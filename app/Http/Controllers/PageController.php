<?php

namespace App\Http\Controllers;

use App\Models\Block;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $blocks = Block::orderBy('block_index', 'desc')->get();
        $recentBlocks = $blocks->take(5);
        $totalBlocks = $blocks->count();
        $totalTransactions = $totalBlocks;
        $totalVolume = $blocks->reduce(function ($carry, $block) {
            $data = json_decode($block->data, true);
            return $carry + ($data['amount'] ?? 0);
        }, 0);
        $activeUsers = $blocks
            ->flatMap(function ($block) {
                $data = json_decode($block->data, true);
                return [
                    $data['sender'] ?? null,
                    $data['receiver'] ?? null,
                ];
            })
            ->filter()
            ->unique()
            ->count();

        return view('home', compact('recentBlocks', 'totalBlocks', 'totalTransactions', 'totalVolume', 'activeUsers'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function search(Request $request)
    {
        $q = $request->query('q', '');
        return view('search', ['q' => $q]);
    }
}
