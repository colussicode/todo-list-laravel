<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function index () {
        $listItems = ListItem::on()->where('is_complete', 0)->get();
        return view('welcome', compact('listItems'));
    }

    public function markComplete (ListItem $listItem)
    {
        $listItem->is_complete = 1;
        $listItem->save();

        return redirect('/');
    }

    public function saveItem(Request $request)
    {
        $newListItem = new ListItem;
        $newListItem->name = $request->listItem;
        $newListItem->save();

        return redirect('/');
    }
}
