<?php

namespace App\Http\Controllers;

use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('item_type')->get();

        return view('item.index', compact('items'));
    }


}
