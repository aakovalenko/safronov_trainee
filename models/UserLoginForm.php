<?php
namespace app\models;

use yii\base\Model;
use Yii;


class UserLoginForm extends Model
{
    public $email;
    public $password;

    public function rules()
    {
        return [
            ['email','required'],
            ['password','required'],
            ['email','email'],
            ['email','errorIfEmailNotFound'],
            ['password','errorIfPasswordWrong']
        ];
    }

    public function attributeLabels()
    {
        return [

            'email' => 'Email@',
            'password' => 'Password-incognito'
            //
        ];
    }

    public function errorIfPasswordWrong()
    {
        if ($this->hasErrors())
            return;
        $userRecord = UserRecord::findUserByEmail($this->email);
        if ($userRecord->passhash != $this->password);
        $this->addError('password','Wrong password');
    }

    public function errorIfEmailNotFound()
    {
        $userRecord = UserRecord::findUserByEmail($this->email);
        if ($userRecord->email != $this->email)
            $this->addError('email','This email does not registered');
    }

    public function login()
    {
        if ($this->hasErrors())
            return;
        $userRecord = UserRecord::findUserByEmail($this->email);
        $userIdentity = \UserIdentity::findIdentity($userRecord->id);
        Yii::$app->user->login($userIdentity);
    }
}