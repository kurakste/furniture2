<?php 

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use yii\web\UploadedFile;

class FilesController extends Controller
{
    public $layout = 'adminlte';
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload-form', ['model' => $model]);
    }
    
    public function actionIndex()
    {
        $dircontent = new \app\models\Dircontent;
        $files = $dircontent->getListOfImages();

        return $this->render('list-of-file', ['files'=>$files]);
    }

    public function actionShowFiles()
    {
        $dircontent = new \app\models\Dircontent;
        $files = $dircontent->getListOfImages();

        return $this->render('list-of-file', ['files'=>$files]);
    }
}

