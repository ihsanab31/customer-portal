<?php
/**
 * Created by PhpStorm.
 * User: Derry
 * Date: 3/26/2019
 * Time: 1:48 PM
 */

namespace app\controllers;


use app\controllers\base\BaseController;

class DashboardController extends BaseController
{
    public function beforeAction($action)
    {
        BaseController::requireRole([\Yii::$app->params['ROLE']['CUST']]);
        return parent::beforeAction($action);
    }

    public function actionIndex(){
        return $this->render('index');
    }
}