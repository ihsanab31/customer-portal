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
        return User::isLoggedIn();
    }

    public static function requireLogin()
    {
        if (!User::isLoggedIn()) {
            self::redirect(['home/index']);
        }
    }

    public static function requireRole($role)
    {
        if (User::isLoggedIn()) {
            $check = false;
            for ($x = 0; $x < count($role); $x++){
                for ($i = 0; $i < count(User::getRole()); $i++){
                    if ($role[$x] == User::getRole()[$i]){
                        $check = true;
                        break;
                    }
                }
            }

            if (!$check){
                throw new ForbiddenHttpException('You do not have permission to access this page.');
            }
        } else {
            self::redirect(['home/index']);
        }
    }

}