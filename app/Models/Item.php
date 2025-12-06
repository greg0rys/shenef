<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'item_type_id',
        'user_id',
        'asset_id',
    ];

    /**
     * @return BelongsTo
     * get the given type of an item.
     */
    public function item_type(): BelongsTo
    {
        return $this->belongsTo(ItemType::class);
    }

    /**
     * @return BelongsTo to identify assigned user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function buildItem(int $itemTypeId, int $userId, int $assetNum, string $itemName): Item
    {
        $item = new Item();
        $item->item_type_id = $itemTypeId;
        $item->user_id  = $userId;
        $item->asset_id = $assetNum;
        $item->name = $itemName;

        return $item;
    }
}
