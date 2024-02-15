<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Collection;

use App\Models\User;
use App\Models\ListItem;

class UserController extends Controller
{
    public function addItem(Request $request): RedirectResponse
    {
        if ($request->duedate < date('Y-m-d')) {
            return back()->with('msg', 'Error: Please choose a valid date!');
        }

        $item = new ListItem([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'duedate' => $request->duedate,
        ]);
        $user = User::findOrFail(2);
        $user->items()->save($item);

        return redirect(route('lists'));
    }

    public function editItem(Request $request, string $id): RedirectResponse
    {
        if ($request->duedate < date('Y-m-d')) {
            return back()->with('msg', 'Error: Please choose a valid date!');
        }

        $user = User::findOrFail(2);

        $item = $user->items()->where('id', $id)->firstOrFail();
        if ($item) {
            $item->title = $request->title;
            $item->description = $request->description;
            $item->priority = $request->priority;
            $item->duedate = $request->duedate;
        } else {
            return back()->with('msg', 'Error: Invalid!');
        }

        $item->save();

        return redirect(route('lists'));
    }

    public function deleteItem(string $id): RedirectResponse
    {
        $user = User::findOrFail(2);

        $user->items()->where('id', $id)->firstOrFail()->delete();
        return redirect(route('lists'));
    }
}
