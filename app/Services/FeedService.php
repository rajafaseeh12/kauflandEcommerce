<?php

namespace App\Services;

use App\Models\FeedItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FeedService
{

    public static function storeImportedFeedsToDB($feedData){
        foreach ($feedData->children() as $data) {

            $feedItem = new FeedItems();

            $feedItem->entity_id = $data->entity_id;
            $feedItem->categoryName = $data->CategoryName;
            $feedItem->sku = $data->sku;
            $feedItem->name = $data->name;
            $feedItem->description = $data->description;
            $feedItem->shortdesc = $data->shortdesc;
            $feedItem->price = !empty($data->price) ? $data->price : null;
            $feedItem->link = $data->link;
            $feedItem->image = $data->image;
            $feedItem->brand = $data->Brand;
            $feedItem->rating = !empty($data->Rating) ? $data->Rating : null;
            $feedItem->caffeineType = $data->CaffeineType;
            $feedItem->count = !empty($data->Count) ? $data->Count : null;
            $feedItem->flavored = $data->Flavored;
            $feedItem->seasonal = $data->Seasonal;
            $feedItem->instock = $data->Instock;
            $feedItem->facebook = $data->Facebook;
            $feedItem->IsKCup =  !empty($data->IsKCup) ? $data->IsKCup : null;

            $feedItem->save();
        }

        return ['logMessage' => 'Data successfully imported '];
    }

}
