<?php

namespace App\Http\Controllers;

use App\Models\Block;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function create()
    {
        return view('transaction.create');
    }

    public function store(Request $request)
    {

        $data = [
            'sender' => $request->sender,
            'receiver' => $request->receiver,
            'amount' => $request->amount
        ];

        $lastBlock = Block::orderBy('block_index','desc')->first();

        $index = $lastBlock ? $lastBlock->block_index + 1 : 1;

        $previousHash = $lastBlock ? $lastBlock->hash : '0000';

        $hash = hash('sha256', $index . json_encode($data) . $previousHash);

        $block = Block::create([
            'block_index' => $index,
            'data' => json_encode($data),
            'previous_hash' => $previousHash,
            'hash' => $hash
        ]);

        return redirect()->route('transaction.show', ['id' => $block->id]);
    }

    public function show($id)
    {
        $block = Block::findOrFail($id);
        return view('transaction.show', compact('block'));
    }
}