<?php

namespace app\controllers;

use app\controllers\base\BaseController;
use Yii;
use app\models\ElectricPrice;
use app\models\ElectricPriceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ElectricpriceController implements the CRUD actions for ElectricPrice model.
 */
class ElectricpriceController extends Controller
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
     * Lists all ElectricPrice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ElectricPriceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ElectricPrice model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (isset($id) && !empty($id)) {
            $model = $this->findModel($id);
            return $this->render('view', [
                'model' => $model,
            ]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new ElectricPrice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ElectricPrice();

        if ($model->load(Yii::$app->request->post())) {
            $model->entryuserid = Yii::$app->session->get('userid');
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Created');
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', 'Failed');
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ElectricPrice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (isset($id) && !empty($id)) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post())) {
                $model->modifyuserid = Yii::$app->session->get('userid');
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Updated');
                    return $this->redirect(['index']);
                } else {
                    Yii::$app->session->setFlash('danger', 'Failed');
                }
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Deletes an existing ElectricPrice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (isset($id) && !empty($id)) {
            $model = $this->findModel($id);
            $model->isactive = 0;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Deleted');
            } else {
                Yii::$app->session->setFlash('danger', 'Failed');
            }
            return $this->redirect(['index']);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the ElectricPrice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ElectricPrice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ElectricPrice::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
