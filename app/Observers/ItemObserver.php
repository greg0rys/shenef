<?php

namespace App\Observers;

use App\Models\Item;

class ItemObserver
{
    public function creating(Item $item): void
    {
        if(!$item->isDirty('item_type_id'))
        {
            $item->item_type_id = Item::all()->random()->item_type_id;
        }

        if(!$item->isDirty('name'))
        {
            $item->name = '[Name Not Set]';
        }

        if(!$item->isDirty('company_location_id'))
        {
            $item->company_location_id = 43;
        }

        if(!$item->isDirty('user_id'))
        {
            $item->user_id = 50;
        }

        $item->asset_id = Item::latest()->first()->asset_id + 1;
    }
    /**
     * Handle the Item "created" event.
     */
    public function created(Item $item): void
    {
        //
    }

    /**
     * Handle the Item "updated" event.
     */
    public function updated(Item $item): void
    {
        //
    }

    /**
     * Handle the Item "deleted" event.
     */
    public function deleted(Item $item): void
    {
        //
    }

    /**
     * Handle the Item "restored" event.
     */
    public function restored(Item $item): void
    {
        //
    }

    /**
     * Handle the Item "force deleted" event.
     */
    public function forceDeleted(Item $item): void
    {
        //
    }
}
