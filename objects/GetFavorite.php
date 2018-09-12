<?php

namespace app\objects;

use app\models\Favorite;
use app\models\Items;

class GetFavorite 
{
    /*
     * Returns collection of items that are in favorite list
     */
    public function get() 
    {
        $favorites = Favorite::find()->select('iid')->column();
        $items = Items::findAll($favorites); 

        return $items;
    }

}
