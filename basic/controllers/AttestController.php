<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\Request;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\data\Pagination;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UdoData;
use app\models\FilterForm;
use app\models\Test;
use app\models\Nmc42mdl_user;

class AttestController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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
    public function actions() {
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
    public function actionIndex() {
        mb_regex_encoding('UTF-8');
        $sql = "SELECT nmc42test.nmc42mdl_user.username FROM nmc42test.nmc42mdl_user ;";
        $query = Nmc42mdl_user::find();
        $pages = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count()]);
        $users = Nmc42mdl_user::find()->orderBy('lastname')
                ->offset($pages->offset)
                ->all();

        return $this->render('index', [
                    'users' => $users,
                    'pagination' => $pages,
                    'pagesCount' => $pages->defaultPageSize,
                    'totalCount' => $query->count(),
        ]);
    }

    public function actionPdf() {
        mb_regex_encoding('UTF-8');
        $sql = "SELECT nmc42test.nmc42mdl_user.username FROM nmc42test.nmc42mdl_user ;";
        $req = Yii::$app->request;
        $id = $req->get('id');
        $user = Nmc42mdl_user::findOne($id);

        return $this->render('pdf', [
                    'user' => $user,
                    'getId' => $id,
        ]);
    }
    public function actionUser() {
        mb_regex_encoding('UTF-8');
        $req = Yii::$app->request;
        $id = $req->get('id');
        $user = Nmc42mdl_user::findOne($id);

        return $this->render('user', [
                    'user' => $user,
                    'getId' => $id,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout() {
        return $this->render('about');
    }

    public function actionTest() {
        $testTitle = "Тестовая страница";

        $model = new Test();

        $model->load(Yii::$app->request->post());
        return $this->render('test', ['model' => $model,
                    'testTitle' => $testTitle,
        ]);
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            return $this->render('testmsg', ['model' => $model,
//                        'testTitle' => $testTitle,
//            ]);
//        } else {
//            return $this->render('test', ['model' => $model]);
//        }
    }

}
