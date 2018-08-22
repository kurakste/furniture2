<?php

namespace app\controllers;

use Yii;
use app\models\Orders;
use app\models\Carts;
use app\models\Ostrings;
use app\models\OrdersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\objects\ViewModels\OrderCreateView;
use yii\filters\AccessControl;


/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $layout = 'adminlte';
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete' ],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orders model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Orders();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionGetform()
    {
        $this->layout = 'furniture';

        if (\Yii::$app->request->post()) {
            $data = \Yii::$app->request->post();

            $order = new Orders;
            $order->load($data); 
            $order->processflag = 'new';
            if ($order->validate()) {
                $order->save();
                
                $ssid = \Yii::$app->session->getId();
                $carts = Carts::find()
                    ->where(['ssid' => $ssid])
                    ->all();
                foreach ($carts as $cart) {
                    $ostring = new Ostrings;
                    $ostring->attributes = $cart->attributes;
                    $ostring->oid = $order->id;
                    $ostring->save();
                }
                Carts::deleteAll(['ssid' => $ssid]);
            } 

            return $this->redirect('/');
        }

        $order = new Orders;
        $cities = new OrderCreateView;

        $ssid = (new \yii\web\session)->id;
        $summ = \app\models\Carts::getSummtOfCart($ssid);


        return $this->render
            (
                'getform', 
                [
                    'model'=>$order, 
                    'summ' => $summ, 
                    'cities' => $cities,
                ]
            );
    }

    public function actionStoreOrder()
    {
        $request = \Yii::$app->request->post();
        $ssid = (new \yii\web\session)->id;

        $order = new Orders;
        $request['processflag'] = 'new';
        $order->attributes = $request;

        if ($order->validate()) {
            $order->save();
            
            Orders::storeCartStinsInOrderString($order->id);
            Orders::clearCart();
            $out = null;
            $this->redirect('/');
            return;

        } else {
            // проверка не удалась:  $errors - это массив содержащий сообщения об ошибках
            $out = $newcartstring->errors;
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $out;
        }
       var_dump($request); 
        echo 'hi!'; 
    }
}
