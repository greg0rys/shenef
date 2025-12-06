<?php
// Tinker away!
use App\Models\CompanyLocations;
use App\Models\Item as it;
use App\Models\ItemType as itType;
use App\Models\User;

//echo "Searching for the name of the first item: " . it::find(1)->name;
//
//$ite = it::buildItem(12,3,rand(1010200,99999),'trigger test');
//$ite->save();
//
//$all_items = it::all();
//
//$all_items->each(function ($item){
//   echo $item->name . "\n";
//});
//

//$rel = it::with(['user', 'item_type'])->orderBy('name')->get();
//
//$rel->each(function ($item){
//    echo "{\n\t";
//    echo "Item Name: ". $item->name . "\n\t";
//    echo "Item Type: " . $item->item_type->name . "\n\t";
//    echo "User: " . $item->user->name . "\n}\n\n";
//});

// take advantage of the user ovserver model
//$user = User::create([
//    'company_location_id' => CompanyLocations::all()->random()->id,
//    'first_name' => 'Mari',
//    'last_name' => 'Aylett',
//    'company_name' => 'SHENLODGE',
//    'personal_email' => 'mari@shenefelt.org',
//    'password' => Hash::make('password'),
//                     ]);



echo "\ntest begin\n";
echo str_repeat('**', 25);
echo "\n";

//for($i = 0; $i < 2; $i++)
//    User::all()->last()->delete();
//$test = User::find(3);
//$test->company_email = $test->username . "@" . strtolower($test->company->name) . ".com";
//$test->save();
//echo "updated email => " . $test->company_email . "\n\n";

// test all user functions.
$last_item = it::all()->last();
echo "Last item: $last_item->name\n";
echo "Last item id: $last_item->id\n";
echo "Assigned to: " . $last_item->user->username . "\n";
echo "Located At: " . $last_item->company_location->name . "\n";

echo str_repeat('**', 25);
it::all()->each(function ($item) {
    $item->asset_id = rand(1010200, 9999999);
    $item->save();
});
