<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\ListItem;

class ListController extends Controller
{
    public function show(): View
    {
        $items = ListItem::where('user_id', 2)->get();
        return view('lists.index', [
            'items' => $items,
        ]);
    }

    public function detail(?string $id = null): View
    {
        $item = null;
        if (!$id) {
            $item = new ListItem();
        } else {
            $item = ListItem::findOrFail($id);
        }
        return view('lists.detail', [
            'item' => $item,
        ]);
    }

    public function delete(string $id): View
    {
        $item = ListItem::findOrFail($id);
        return view('lists.delete', [
            'item' => $item,
        ]);
    }
}
