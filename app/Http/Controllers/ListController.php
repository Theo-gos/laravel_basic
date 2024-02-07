<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ListController extends Controller
{
    public function show(): View
    {
        $items = DB::table('todoitems')->get();
        return view('lists.index', [
            'items' => $items,
        ]);
    }
}
