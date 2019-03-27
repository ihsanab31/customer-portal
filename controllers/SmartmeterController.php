<?php
/**
 * Created by PhpStorm.
 * User: Derry
 * Date: 3/26/2019
 * Time: 3:06 PM
 */

namespace app\controllers;

use app\controllers\base\BaseController;
use app\models\BuildingUnit;
use app\models\Electricity;
use app\models\ElectricPrice;
use app\models\Topup;
use Yii;
use yii\web\ForbiddenHttpException;

class SmartmeterController extends BaseController
{

    public function beforeAction($action)
    {
        BaseController::requireRole([Yii::$app->params['ROLE']['PEMILIK'], Yii::$app->params['ROLE']['PENYEWA']]);
        return parent::beforeAction($action);
    }

    public function actionIndex(){
        BaseController::requireRole([Yii::$app->params['ROLE']['PEMILIK'], Yii::$app->params['ROLE']['PENYEWA']]);
        $unit = BuildingUnit::findOne(['unitid' => 1]);
        return $this->render('status', ['unit' => $unit]);
    }

    public function actionTopup(){
        BaseController::requireRole([Yii::$app->params['ROLE']['PEMILIK'], Yii::$app->params['ROLE']['PENYEWA']]);
        // get data user & his/her selected unit
        $topup = new Topup();

        // get how much token he/she want
        $price = new ElectricPrice(); //example model

        // select payment method, either using ovo, dana
//        $payment = new PaymentMethod();

        if ($topup->load(Yii::$app->request->post())){
            $topup->entryuserid = Yii::$app->session->get('userid');
            if($price->load(Yii::$app->request->post())){
                $price->entryuserid = Yii::$app->session->get('userid');
//                if ($payment->load(Yii::$app->request->post())){
                    if($topup->save()){
                        Yii::$app->session->setFlash('success', 'Top Up success!' .$topup->nominalkwh.' has been added to your apartment unit');
                    }else{
                        Yii::$app->session->setFlash('danger', 'Top Up failed! Please check your balance');
                    }
               /* }else{
                    Yii::$app->session->setFlash('warning', 'Failed to load payment method!');
                }*/
            }else{
                Yii::$app->session->setFlash('warning', 'Failed to load electricity price!');
            }
        }else{
            Yii::$app->session->setFlash('warning', 'Failed to load your unit detail!');
        }
        return $this->render('topup', [
            'topup' => $topup,
            'price' => $price,
//            'payment' => $payment,
        ]);
    }

    public function actionReport(){
        BaseController::requireRole([Yii::$app->params['ROLE']['PEMILIK']]);
        return $this->render('report');
    }

}