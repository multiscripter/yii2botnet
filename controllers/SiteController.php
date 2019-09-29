<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\App\Event\EventList;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\LoginForm;
use app\models\Person;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
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
        //$person =  new Person();
        //$person->username = 'SiteController.actionIndex()';
        //$person->trigger(EventList::FOR_OWNER_TICKET_BUSINESS);
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
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
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
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
    public function actionAbout()
    {
        //Yii::debug('Debug example message', __METHOD__);
        //Yii::info('Info example message', __METHOD__);
        //Yii::warning('Warning example message', __METHOD__);
        //Yii::error('Error example message', __METHOD__);
        return $this->render('about');
    }
    
    /**
     * Кастомное действие.
     * http://yii2.bot.net/index.php?r=site%2Fsay-hello&message=Первопроходцы!
     */
    public function actionSayHello($message = 'Прыуэд')
    {
        return $this->render('sayHello', ['msg' => $message]);
    }

    /**
     * Кастомное действие обработки данных формы.
     * http://yii2.bot.net/index.php?r=site%2Fentry
     * @return string отрисованное предстваление.
     */
    public function actionEntry()
    {
        $model = new EntryForm();
        $view = $model->load(Yii::$app->request->post()) && $model->validate()
                ? 'entry-confirm' : 'entry';
        return $this->render($view, ['model' => $model]);
    }
}
