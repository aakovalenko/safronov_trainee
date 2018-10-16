<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 05.09.18
 * Time: 9:47
 */

namespace app\controllers;


use app\models\UserJoinForm;
use app\models\UserRecord;
use app\models\UserLoginForm;
use yii\web\Controller;

use Yii;


class UserController extends Controller
{
    public function actionJoin()
    {
        if (Yii::$app->request->isPost)
            return $this->actionJoinPost();

        $userJoinForm = new UserJoinForm();
        $userRecord = new UserRecord();
        $userRecord->setTestUser();
        $userJoinForm->setUserRecord($userRecord);
        $userJoinForm->name = "Magic";

        return $this->render('join', compact('userJoinForm')

        );
    }

    /**
     * @return string
     */
    public function actionJoinPost()
    {
        $userJoinForm = new UserJoinForm();
        if ($userJoinForm->load(Yii::$app->request->post()));
        if ($userJoinForm->validate())
        {
            $userRecord = new UserRecord();
            $userRecord->setUserJoinForm($userJoinForm);
            $userRecord->save();
            return $this->redirect('/user/login');
        }

        //$userJoinForm->name .= ".";
        return $this->render('join',['userJoinForm' => $userJoinForm]); //compact('userJoinForm')
    }

    public function actionLogin()
    {
        if (Yii::$app->request->isPost)
            return $this->actionLoginPost();
        $userLoginForm = new UserLoginForm();

        return $this->render('login',compact('userLoginForm'));
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionLoginPost()
    {
        $userLoginForm = new UserLoginForm();
        if ($userLoginForm->load(Yii::$app->request->post()))
            if ($userLoginForm->validate())
            {
                $userLoginForm->login();
                return $this->redirect("/");
            }
        return $this->render('login',compact('userLoginForm'));
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect("/");
    }


}