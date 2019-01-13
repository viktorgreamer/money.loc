<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Payments;
use app\modules\admin\models\PaymentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PaymentsController implements the CRUD actions for Payments model.
 */
class PaymentsController extends Controller
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
     * Lists all Payments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PaymentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionConfirm()
    {
        if ($payment_id = $_POST['payment_id']) {
            if (!$payment = Payments::findOne($payment_id)) {
                return json_encode(['status' => 0, 'message' => "The Payment ID " . $payment_id . " does not exist"]);
            } else {
                if ($payment->status == Payments::STATUS_CONFIRMED) {
                    return json_encode(['status' => 0, 'message' => "The Payment ID " . $payment_id . " has already been confirmed"]);
                } else {
                    $payment->status = Payments::STATUS_CONFIRMED;
                    $payment->confirmed_at = time();
                    $payment->update(false);
                    return json_encode(['status' => 1, 'message' => "The Payment ID " . $payment_id . " has been confirmed"]);

                }
            }

        }
    }

    public function actionDeny()
    {
        if ($payment_id = $_POST['payment_id']) {
            if (!$payment = Payments::findOne($payment_id)) {
                return json_encode(['status' => 0, 'message' => "The Payment ID " . $payment_id . " does not exist"]);
            } else {
                if ($payment->status == Payments::STATUS_DENIED) {
                    return json_encode(['status' => 0, 'message' => "The Payment ID " . $payment_id . " has already been denied"]);
                } else {
                    $payment->status = Payments::STATUS_DENIED;
                    $payment->confirmed_at = time();
                    $payment->update(false);
                    return json_encode(['status' => 1, 'message' => "The Payment ID " . $payment_id . " has been denied"]);

                }
            }

        }
    }
    public function actionInProcessing()
    {
        if ($payment_id = $_POST['payment_id']) {
            if (!$payment = Payments::findOne($payment_id)) {
                return json_encode(['status' => 0, 'message' => "The Payment ID " . $payment_id . " does not exist"]);
            } else {
                if ($payment->status == Payments::STATUS_IN_PROCESSING) {
                    return json_encode(['status' => 0, 'message' => "The Payment ID " . $payment_id . " has already been in processing"]);
                } else {
                    $payment->status = Payments::STATUS_IN_PROCESSING;
                    $payment->confirmed_at = time();
                    $payment->update(false);
                    return json_encode(['status' => 1, 'message' => "The Payment ID " . $payment_id . " has been processing"]);

                }
            }

        }
    }

    /**
     * Displays a single Payments model.
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
     * Creates a new Payments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Payments();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Payments model.
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
     * Deletes an existing Payments model.
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
     * Finds the Payments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Payments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Payments::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
