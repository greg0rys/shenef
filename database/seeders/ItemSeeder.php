<?php

namespace Database\Seeders;

use App\Models\Item;
use Database\Factories\ItemFactory;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run()
    {
        Item::factory(25)->create();
    }
}
