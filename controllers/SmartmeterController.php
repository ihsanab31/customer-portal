<?php
/**
 * Created by PhpStorm.
 * User: Derry
 * Date: 3/26/2019
 * Time: 3:06 PM
 */

namespace app\controllers;

use app\controllers\base\BaseController;
use app\models\BuildingFloor;
use app\models\BuildingUnit;
use Yii;
use yii\web\ForbiddenHttpException;

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

    public function actionAjax()
    {
        if (Yii::$app->request->isAjax) {
            $unitid = Yii::$app->request->post()['unitid'];
            $unit = BuildingUnit::find()->where(['unitid' => $unitid])->all();
            $unitname = $unit[0]->nama;
            $floorname = $unit[0]->floor->nama;
            $towername = $unit[0]->tower->nama;

            $result['total'] = count($unit);
            if ($result['total'] > 0) {
                $result['unitname'] = $unitname;
                $result['floorname'] = $floorname;
                $result['towername'] = $towername;
            }
            return json_encode($result);
        } else {
            throw new ForbiddenHttpException('You do not have permission to access this page.');
        }
    }

}