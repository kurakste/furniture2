<?php 

namespace  app\objects\widgets\cfselector;

use yii\base\Widget;
use app\models\Item;
use app\models\Factures;
use app\models\Color;

class Colorandfactureselector extends Widget
{
    public $item;

    public function init()
    {
        parent::init();
    }

    public function run()
    {

      $factures = Factures::find()->all();  
      $colors =Color::find()->all();  
      return $this->render('colorandfacture', 
          [
              'item' => $this->item,
              'colors' => $colors,
              'factures' => $factures,
          ]
      );
    }

    
}
