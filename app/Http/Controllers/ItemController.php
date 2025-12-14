<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('item_type')
                     ->get()
        ;


        // loading with group by user id to keep the items clean
        $grouped_items = $items
            ->groupBy('user_id')
            ->toArray()
        ;

        return view(
            'item.index',
            compact(
                'items',
                'grouped_items')
        );

    }

    /**
     * @param User $user - the given user to query e.g. users/{id}/items
     * @return Factory|View|\Illuminate\View\View
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

    // pass the given item to the view to see info about the item itself. inverse of above.
    public function itemInformation(Item $item)
    {
        // use direct param - you have already passed the item in from the request.
        return view(
            'item.item-information',
            compact('item'));
    }

    /**
     * @param User $usr
     * @param Item $item
     * @return bool
     * Transfer a given item to a user from the front end.
     */
    public function transferItem(User $usr, Item $item): bool
    {
        $item->user_id = $usr->id;
        return $item->save();
    }


}
