<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Item extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $fillable = [
        'name',
        'notes',
        'item_type_id',
        'user_id',
        'asset_id',
        'company_location_id'
    ];

    /**
     * @return BelongsTo
     * get the given type of item.
     */
    public function item_type(): BelongsTo
    {
        return $this->belongsTo(ItemType::class);
    }

    /**
     * An item can be assigned to any user or set null
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A given item resides at a given location at any time.
     * @return BelongsTo
     */
    public function company_location(): BelongsTo
    {
        return $this->belongsTo(CompanyLocations::class);
    }

    // make an item quicker cause lazy
    public static function buildItem(string $itemName): Item
    {
        $item = new Item();
        $item->item_type_id = ItemType::all()->random()->id;
        $item->user_id  = User::all()->random()->id;
        $item->company_location_id = CompanyLocations::all()->random()->id;
        $item->asset_id = (Item::all()->random()->asset_id + 1);
        $item->name = $itemName;


        return $item;
    }

    public static function transferItem(User $user, Item $item): bool
    {
        echo "Transferring $item->name to $user->full_name\n";
        $item->user_id = $user->id;
        return $item->save();
    }
}
