<?php

namespace app\controllers\base;

use Yii;
use yii\web\Controller;
use app\models\User;
use yii\web\ForbiddenHttpException;

class BaseController extends Controller
{
    public function init()
    {
        parent::init();
    }

    public function beforeAction($action)
    {
        return parent::beforeAction($action);
    }

    public static function checkIsLogin()
    {
        return Yii::$app->session->get('loggedIn');
    }

    public static function requireLogin()
    {
        if (!Yii::$app->session->get('loggedIn')) {
            self::redirect(['site/index']);
        }
    }

    public static function requireRole($role)
    {
        if (Yii::$app->session->get('loggedIn')) {
            $check = false;
            for ($x = 0; $x < count($role); $x++){
                for ($i = 0; $i < count(Yii::$app->session->get('rolename')); $i++){
                    if ($role[$x] == Yii::$app->session->get('rolename')[$i]){
                        $check = true;
                        break;
                    }
                }
            }

            if (!$check){
                throw new ForbiddenHttpException('You do not have permission to access this page.');
            }
        } else {
            self::redirect(['site/index']);
        }
    }

}