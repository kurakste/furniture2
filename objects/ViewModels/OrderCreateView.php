<?php

namespace app\objects\ViewModels;

use app\models\Cities;

Class OrderCreateView 
{
    /**
     *  Returns cities and codes for PEC delivery
     *  service.
     *
     * @return array
     *
     */
    public function getCities()
    {
        return Cities::find()
            ->indexBy('name')
            ->select(['name' ])
            ->column();
    }
    

}
