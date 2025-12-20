<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ItemController extends Controller
{
    public function index()
    {
        $all_items = Item::withTrashed()
                         ->get()
        ;
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


    public function destroy(Item $item)
    {
        $item->delete();
        $item->deployment_status = "Destroyed";
        $item->save();
        return redirect()->route('items.index');
    }

    public function show(Item $item)
    {

        return view(
            'item.show',
            compact('item'));
    }

    /**
     * @return View
     * Get items based on their item_type_id - since this will show items of that type sort by the location id
     */
    public function getItemByType(int $item_type)
    {
        $items = Item::where(
            'item_type_id',
            $item_type)
                     ->withTrashed()
                     ->get()
        ;
        $items = $items->sortBy('company_location_id');
        return view(
            'item.byType',
            compact('items'));
    }

    public function edit(Item $item)
    {
        return view(
            'item.edit',
            [
                'item' => $item
            ]);
    }

    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->update($request->validated());
        return redirect()
            ->route('items.index')
            ->with(
                'success',
                'updated item')
        ;
    }


}
