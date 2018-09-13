<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Carts;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $cartscount = null;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout' ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $items = \app\models\Items::find()->where(['cid'=>1])->all();
        return $this->render('index', [ 'items' => $items ]);
    }
    
    public function actionChair()
    {
        $items = \app\models\Items::find()->where(['cid'=>1])->all();
        return $this->render('index', [ 'items' => $items ]);
    }
    
    public function actionTables()
    {
        $items = \app\models\Items::find()->where(['cid'=>2])->all();
        return $this->render('tables', [ 'items' => $items ]);
    }

    public function actionFavorite()
    {
        $fav = new \app\objects\GetFavorite;
        $items = $fav->get();
        
        return $this->render('index', [ 'items' => $items ]);
    }

    /**
     * Login action.
     *
     * @return Response string
     */
    public function actionLogin()
    {
        $this->layout ='loginadminlte';
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/admin');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/admin');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionTerms()
    {
        return $this->render('terms');
    }
    
    public function actionPayOk()
    {
        return $this->render('payok');
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('/admin');
    }



    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionContact()
    {
        return $this->render('contact');
    }

    public function actionSendMail()
    {
        $clientEmail = Yii::$app->request->post('email');
                \Yii::$app->mailer->compose('/mail/mail-request', [
                    'clientEmail' => $clientEmail
                    ])
                    ->setFrom('yoursiteaudit@yandex.ru')
                    ->setTo([env('ADMIN_EMAIL'), env('OP_EMAIL')])
                    ->setSubject('Email request')
                    ->send();
                // =======================================
        
        return $this->redirect('/');
    }

    public function actionAjaxAddFavorite()
    {
        $iid =(int)Yii::$app->request->get('iid');
        if (!($iid > 0)) {
            throw new NotFoundHttpException('Недопустимый индекс товара');
        }

        $favorite = \app\models\Favorite::find()->where(['iid'=>$iid])->one();
        if ($favorite) {
            // Если товар уже есть в таблице, его нельзя добавить второй раз.
            throw new NotFoundHttpException('Недопустимый индекс товара');
        }

        $favorite = new \app\models\Favorite;
        $favorite->iid = $iid;
        $res = $favorite->save();
        
        if (!$res) {
            throw new NotFoundHttpException('Недопустимый индекс товара');
        }
        return $this->redirect('/items');        
    }

    public function actionAjaxRemoveFavorite()
    {
        $iid =(int)Yii::$app->request->get('iid');
        if (!($iid > 0)) {
            throw new NotFoundHttpException('Недопустимый индекс товара');
        }

        $favorite = \app\models\Favorite::find()->where(['iid'=>$iid])->one();

        if (!$favorite) {
            throw new NotFoundHttpException('Недопустимый индекс товара');
        }

        $favorite->delete();

        return $this->redirect('/items');
    }

    public function actionTest()
    {
    }


}
