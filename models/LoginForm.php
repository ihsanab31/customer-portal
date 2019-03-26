<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        $username = Yii::$app->request->post()['LoginForm']['username'];
        $password = Yii::$app->request->post()['LoginForm']['password'];
        $userid = AppUser::findOne(['username' => $username])->userid;
        if (!empty($userid)) {
            $userdata = AppUser::findOne(['userid' => $userid, 'password' => md5($password)]);
            if (!empty($userdata)) {
                return true;
            } else {
                Yii::$app->session->setFlash('danger', 'Incorrect Password');
                return false;
            }
        } else {
            Yii::$app->session->setFlash('danger', 'Username not found');
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    private function getSingleAppUser($username, $password)
    {
        $model = AppUser::findOne(['username' => $username, 'password' => md5($password)]);
        return $model;
    }

    private function getSingleAppUserSchema($userid)
    {
        $model = AppUserSchema::findOne(['userid' => $userid]);
        return $model;
    }

    private function getSingleSite($schemaname)
    {
        $model = MasterSite::findOne(['schemaname' => $schemaname]);
        return $model;
    }

    private function getUserRoleNames($userid)
    {
        $roleid = AppUserRole::find()->select('roleid')->where(['userid' => $userid])->all();
        if (!empty($roleid)) {
            $rolename = AppRole::find()->where(['in', 'roleid', $roleid]);
            if (!empty($rolename)) {
                $model = $rolename->all();
                return $model;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function storeUserSession($data)
    {
        $username = $data['LoginForm']['username'];
        $password = $data['LoginForm']['password'];
        $user = self::getSingleAppUser($username, $password);
        $rolenames = self::getUserRoleNames($user->userid);

        Yii::$app->session->set('userid', $user->userid);
        Yii::$app->session->set('username', $user->username);
        Yii::$app->session->set('status', $user->status);
        Yii::$app->session->set('nama', $user->nama);
        if (!empty($rolenames)) {
            $role = [];
            foreach ($rolenames as $row) {
                $role[] = $row->nama;
            }
            Yii::$app->session->set('rolename', $role);
            if ($user->jenis !== 'SYS') {
                $schema = self::getSingleAppUserSchema($user->userid);
                $site = self::getSingleSite($schema->schemaname);
                if (!empty($schema) && !empty($site)) {
                    Yii::$app->session->set('schemaname', $schema->schemaname);
                    Yii::$app->session->set('siteid', $site->siteid);
                    Yii::$app->session->set('loggedIn', true);
                } else {
                    Yii::$app->session->destroy();
                }
            } else {
                Yii::$app->session->destroy();
            }
        } else {
            Yii::$app->session->destroy();
        }
    }

}
