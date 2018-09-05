<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 05.09.18
 * Time: 9:47
 */

namespace app\controllers;


use yii\web\Controller;

class UserController extends Controller
{
    public function actionJoin()
    {
        return $this->render('join');
    }

    public function actionLogin()
    {
        return $this->render('login');
    }
}