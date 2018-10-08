<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 05.09.18
 * Time: 9:47
 */

namespace app\controllers;


use app\models\UserJoinForm;
use yii\web\Controller;
use Yii;


class UserController extends Controller
{
    public function actionJoin()
    {
        $userJoinForm = new UserJoinForm();

        return $this->render('join', compact('userJoinForm')

        );
    }

    public function actionLogin()
    {
        $uid = \UserIdentity::findIdentity(1);
        Yii::$app->user->login($uid);

        return $this->render('login');
    }
}