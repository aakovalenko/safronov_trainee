<?php
namespace app\models;

use yii\base\Model;
use Yii;


class UserLoginForm extends Model
{
    public $email;
    public $password;
    private $userRecord;

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

    public function errorIfEmailNotFound()
    {
        $this->userRecord = UserRecord::findUserByEmail($this->email);
        if ($this->userRecord->email == null)
            $this->addError('email','This email does not registered');
    }

    public function errorIfPasswordWrong()
    {
        if ($this->hasErrors())
            return;

        if ($this->userRecord->passhash != $this->password);
        $this->addError('password','Wrong password');
    }



    public function login()
    {
        if ($this->hasErrors())
            return;

        $userIdentity = \UserIdentity::findIdentity($this->userRecord->id);
        Yii::$app->user->login($userIdentity);
    }
}