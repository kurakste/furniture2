<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class Dircontent extends Model
{
    public function getListOfImages()
    {
        $a = glob('img/*.jpg');
        $out = array_merge($a, glob('img/*.png'));

        return $out;
    }
}
