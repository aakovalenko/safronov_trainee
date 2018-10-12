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

    public function actionJoinPost()
    {
        $userJoinForm = new UserJoinForm();
        if ($userJoinForm->load(Yii::$app->request->post()));
        if ($userJoinForm->validate())
            $userJoinForm->name = "ok";

        //$userJoinForm->name .= ".";
        return $this->render('join',['userJoinForm' => $userJoinForm]); //compact('userJoinForm')
    }

    public function actionLogin()
    {
       // $uid = \UserIdentity::findIdentity(1);
       // Yii::$app->user->login($uid);

        return $this->render('login');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect("/");
    }


}