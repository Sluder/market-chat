<?php

namespace App\Http\Controllers;

use App\Models\Symbol;

class MarketController extends Controller
{
    // Shows page for market symbol
    public function showSymbol($ticker)
    {
        $symbol = Symbol::whereTicker($ticker)->first();

        if ($symbol) {
            return view('pages.symbol', compact('symbol'));
        }

        // throw 404 symbol not found
    }

}
