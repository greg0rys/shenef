<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Item;
use App\Models\ItemType;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ItemController extends Controller
{
    public function index()
    {
        $all_items = Item::all();
        $items = $all_items->sortBy('company_location_id');




        return view(
            'item.index',
            compact(
                'items'
            )
        );

    }

    /**
     * @param User $user - the given user to query e.g. users/{id}/items
     * @return Factory|View|\Illuminate\View\View
     *
     *
     */
    public function getUserItems(User $user)
    {
        /* elo query to db to get items that match the user ID NOT $user->items() */
        $userItems = Item::where(
            'user_id',
            $user->id)
                         ->get()
        ;

        // compact both into the view - allow dual query for O(log(n))
        return view(
            'item.user-items',
            compact(
                'userItems',
                'user'));
    }



    public function destroy(Item $it)
    {
        $it->delete();
        return redirect()->route('items.index');
    }

    public function show(Item $item)
    {

        return view('item.show', compact('item'));
    }

    /**
     * @return View
     * Get items based on their item_type_id
     */
    public function getItemByType(ItemType $item_type)
    {
        $items = Item::where('item_type_id', $item_type->item_type->id)->get();
        return view('item.index', compact('items'));
    }


}
