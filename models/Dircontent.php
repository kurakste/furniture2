<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class Dircontent extends Model
{
    private $filedir = 'img';

    public function getListOfImages()
    {
        $a = glob($this->filedir.'/*.jpg');
        $out = array_merge($a, glob('img/*.png'));

        return $out;
    }
    /*
     * @param string $filename
     * @return boolean 
     *
     * Принимает имя файла. Пытается его удалить.
     * Если успешно дуалает возвращает true;
     *
     */
    public function deleteFileByName($filename): bool
    {
        return unlink($filename);
    }

    /*
     * @param string $oldName
     * @param string $newName
     * @return bolean
     *
     * Принимает страрое имя файла, новое и 
     * переименовывает файл на диске.  
     */
    public function renameFileByName($oldName, $newName): bool
    {
        return rename($oldName, $newName);
    }
}
