<?php

namespace Database\Factories;

use App\Models\CompanyLocations;
use App\Models\Item;
use App\Models\ItemType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition()
    {
        return [
            'name'       => $this->faker->name(),
            'item_type_id'  => ItemType::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'company_location_id' => CompanyLocations::all()->random()->id,
            'asset_id' => rand(101020010, 99999999),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
