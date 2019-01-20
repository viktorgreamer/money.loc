<?php

namespace app\controllers;

use app\models\forms\EnterSmsCodeForm;
use app\models\forms\SignupForm;
use app\models\Payments;
use app\utils\D;
use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsersController implements the CRUD actions for User model.
 */
class UsersController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                //  'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * SignUp action.
     * @return mixed
     */
    /*public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }*/


    public function actionStatement()
    {
        return $this->render('statement');
    }

    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                if ($user = $model->signup()) {
                    $user->sendSms($user->buildSms($user->generateCode()));
                    $user->update(false);
                    Yii::$app->session->set('user_id', $user->id);
                    //  Yii::$app->getUser()->login($user);
                    return $this->redirect('/users/verify-sms');
                }

            } else {
                D::dump($model->errors);
            }
        }

        return $this->render('_form', [
            'model' => $model,
        ]);
    }


    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
        if ($id = Yii::$app->user->id) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        } else {
            return $this->goHome();
        }

    }

    public function actionHome()
    {
        if ($model = User::findOne(Yii::$app->user->identity->id)) {
            $model->visited_at = time();
            $model->update(false);
            return $this->render('home', [
                'model' => $model,
            ]);
        } else {
           // Yii::$app->session->setFlash('danger', 'Wrong action');
            $this->redirect("/");
        }

    }
    public function actionRepeatSms() {
        if ($user_id = $_POST['user_id']) {
            if ($user = User::findOne($user_id)) {
                $user->sendSms($user->buildSms($this->sms));
            }
        }
    }

    public function actionVerifySms()
    {
        $user_id = Yii::$app->session->get('user_id');
        if (!$user = User::findOne($user_id)) return $this->redirect('home');

        $count = Yii::$app->session->get('count_verify_attempts') + 1;
        Yii::$app->session->set('count_verify_attempts', $count);

        $model = new EnterSmsCodeForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->check($user)) {
                $user->status = User::STATUS_ACTIVE;
                $user->update(false);
                // form inputs are valid, do something here
                Yii::$app->getUser()->login($user);
                return $this->redirect('/users/home');

            } else {
                Yii::$app->session->setFlash('danger',Yii::t('app','Code is wrong, Try again.'));
            }
        }

        if ($user) {
            $model->user_id = $user_id;

            return $this->render('verify_sms_form', [
                'model' => $model,
                'count' => $count,
            ]);
        }

    }

    public function actionSms()
    {
        $model = User::findOne(Yii::$app->user->identity);
        $model->visited_at = time();
        $model->update(false);
        $model->sendSms();
        return $this->render('home', [
            'model' => $model,
        ]);
    }

    public function actionDeposit()
    {
        $model = User::findOne(Yii::$app->user->identity);
        $model->visited_at = time();
        $model->update(false);
        $inputDepositForm = new \app\models\forms\InputDepositForm();

        if ($inputDepositForm->load(Yii::$app->request->post())) {
            if ($inputDepositForm->validate()) {
                $payment = new Payments();
                $payment->user_id = Yii::$app->user->id;
                $payment->value = $inputDepositForm->value;
                $payment->type = Payments::DEPOSIT_TYPE;
                $payment->status = Payments::STATUS_IN_PROCESSING;
                $payment->created_at = time();
                $model->billing += $payment->value;
                $model->update(false);
                $payment->save();
                Yii::$app->session->setFlash('success', ' We received information about your deposit, 
                it will be processed as soon as your transfer  appears on our account');
            }
        }

        $inputDepositForm->value = '';

        return $this->render('deposit', [
            'model' => $model,
            'inputDepositForm' => $inputDepositForm,
        ]);
    }


    public function actionWithdrawal()
    {
        $model = User::findOne(Yii::$app->user->identity);
        $model->visited_at = time();
        $model->update(false);

        $WithdrawalForm = new \app\models\forms\WithdrawalForm();

        if ($WithdrawalForm->load(Yii::$app->request->post())) {
            if ($WithdrawalForm->validate()) {
                $payment = new Payments();
                $payment->user_id = Yii::$app->user->id;
                $payment->value = $WithdrawalForm->value;
                $payment->type = Payments::WITHDRAWAL_TYPE;
                $payment->status = Payments::STATUS_IN_PROCESSING;
                $payment->created_at = time();
              //  $model->billing -= $payment->value;
                $model->update(false);
                $payment->save();
                Yii::$app->session->setFlash('success', 'We received the information about your withdrawal,it will be processed in 48 hours');
            }
        }
        $WithdrawalForm->value = '';
        return $this->render('withdrawal', [
            'model' => $model,
            'WithdrawalForm' => $WithdrawalForm,
        ]);
    }

    public function actionMoneyManagment()
    {
        $model = User::findOne(Yii::$app->user->identity);
        $model->visited_at = time();
        $model->update(false);
        return $this->render('money_management', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
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
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */


    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
