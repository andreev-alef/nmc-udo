<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UdoData;
use app\models\FilterForm;
use app\models\Test;

class SiteController extends Controller {

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
        $filterModel = new FilterForm();
        $udoRows = new UdoData();
        $udoSheet = $udoRows->getAllData();
        $allData = $udoSheet->toArray();
        $dataNotEpty[] = null;
        $j = 0;
        $i = 0;
        $c = 6;
        $r = 1536;
        $N = count($allData);
        $filterModel->load(Yii::$app->request->post());
        if ($filterModel->famil === '') {
            $filterFamil = '/.*/u';
        } else {
            $filterFamil = '/.*' . $filterModel->famil . '.*/u';
        }
        if ($filterModel->gos_nomer === '') {
            $filterGosNomer = '/.*/u';
        } else {
            $filterGosNomer = '/.*' . $filterModel->gos_nomer . '.*/u';
        }
        if ($filterModel->reg_nomer === '') {
            $filterRegNomer = '/.*/u';
        } else {
            $filterRegNomer = '/.*' . $filterModel->reg_nomer . '.*/u';
        }
        while ($j < $N) {
            if ($allData[$j][$c - 1] !== '' && preg_match_all($filterFamil, $allData[$j][8],$matches)!==0) {
                $dataNotEpty[$i] = $allData[$j];
                $i++;
            }
            $j++;
        }


        return $this->render('index', [
                    'rowCount' => count($allData),
                    'rows' => $udoRows->getAllData(),
//                    'cellValue' => $udoSheet->getCellByColumnAndRow($c, $r)->getCalculatedValue(),
//                    'cellValueAB' => $udoSheet->getCell('F1533')->getCalculatedValue(),
//                    'cellNotEmpty' => $dataNotEpty[count($dataNotEpty) - 1][$c - 1],
                    'countNotEmpty' => count($dataNotEpty),
                    'data' => $dataNotEpty,
                    'filterModel' => $filterModel,
                    'filterFamil' => $filterFamil,
                    'matches' => $matches,
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
