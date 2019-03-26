<?php
/**
 * Created by PhpStorm.
 * User: Derry
 * Date: 3/26/2019
 * Time: 3:06 PM
 */

namespace app\controllers;

use app\controllers\base\BaseController;
use app\models\BuildingTower;
use app\models\BuildingUnit;
use Yii;

class SmartmeterController extends BaseController
{

    public function beforeAction($action)
    {
        BaseController::requireRole([Yii::$app->params['ROLE']['CUST']]);
        return parent::beforeAction($action);
    }

    public function actionIndex(){

    }

    public function actionStatus(){
        $unit = BuildingUnit::findOne(['unitid' => 1]);
        return $this->render('status', ['unit' => $unit]);
    }

    public function actionTopup(){

    }

    public function actionDailyusagehistory(){

    }

}