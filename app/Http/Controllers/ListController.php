<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Collection;

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

    public function add(): View
    {
        return view('lists.add');
    }

    public function edit(string $id): View
    {

        $item = ListItem::findOrFail($id);

        return view('lists.edit', [
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

    public function addItem(Request $request): RedirectResponse
    {
        if ($request->duedate < date('Y-m-d')) {
            return back()->with('msg', 'Error: Please choose a valid date!');
        }

        $item = new ListItem([
            'user_id' => 2,
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'duedate' => $request->duedate,
        ]);

        $item->save();

        return redirect(route('lists'));
    }

    public function editItem(Request $request, string $id): RedirectResponse
    {
        if ($request->duedate < date('Y-m-d')) {
            return back()->with('msg', 'Error: Please choose a valid date!');
        }

        $item = ListItem::findOrFail($id);

        $item->title = $request->title;
        $item->description = $request->description;
        $item->priority = $request->priority;
        $item->duedate = $request->duedate;

        $item->save();

        return redirect(route('lists'));
    }

    public function deleteItem(string $id): RedirectResponse
    {
        ListItem::findOrFail($id)->delete();

        return redirect(route('lists'));
    }
}
