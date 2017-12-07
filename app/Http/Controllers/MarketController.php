<?php

namespace App\Http\Controllers;

use App\Models\Symbol;

class MarketController extends Controller
{
    /**
     * View for symbol chat
     */
    public function showSymbol($ticker)
    {
        $symbol = Symbol::whereTicker($ticker)->first();

        if ($symbol) {
            return view('pages.symbol', compact('symbol'));
        }

        // todo: throw 404 symbol not found
    }

}
