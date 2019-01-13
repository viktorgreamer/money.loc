<?php

namespace app\controllers;

use app\models\forms\SignupForm;
use app\models\Payments;
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

    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                $user = $model->signup();
                //  Yii::$app->getUser()->login($user);
                //  return $this->goHome();
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
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionHome()
    {
        $model = User::findOne(Yii::$app->user->identity);
        $model->visited_at = time();
        $model->update(false);
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
                Yii::$app->session->setFlash('success', 'Вы пополнили баланс на ' . $inputDepositForm->value);
            }
        }


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
                $model->billing -= $payment->value;
                $model->update(false);
                $payment->save();
                Yii::$app->session->setFlash('success', 'Withdrawal order done successfully  ' . $WithdrawalForm->value);
            }
        }

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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
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
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

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
