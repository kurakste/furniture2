<?php 

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

class FilesController extends Controller
{
    public $layout = 'adminlte';

    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'upload', 'showFiles', 'rename', 'delete' ],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                // file is uploaded successfully
                return $this->redirect('/files');
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

    public function actionRename()
    {
        $oldname = \Yii::$app->request->post('oldname');
        $newname = \Yii::$app->request->post('newname');

        if (!$oldname || !$newname ) throw new \yii\web\HttpException(404, 'The old or new name could not be found.');
        
        $dircontent = new \app\models\Dircontent;
        $dircontent->renameFileByName($oldname, $newname);

        return $this->redirect('/files');
    }

    public function actionDelete()
    {
        $filename = \Yii::$app->request->post('filename');
        if (!$filename) throw new \yii\web\HttpException(404, 'The requested Item could not be found.');

        $dircontent = new \app\models\Dircontent;
        $result = $dircontent->deleteFileByName($filename); 
        if (!$result) throw new \yii\web\HttpException(404, 'The file could not be found.');
        
        return $this->redirect('/files');
    }
}

