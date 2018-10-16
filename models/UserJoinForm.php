<?php
namespace app\models;

use yii\base\Model;

class UserJoinForm extends Model
{
    public $name;
    public $email;
    public $password;
    public $password2;

    public function rules ()
    {
        return [
          ['name','required'],
          ['email', 'required'],
            ['password', 'required'],
            ['password2', 'required'],
            ['name','string','min' => 3,'max' => 30],
            ['email','email', 'message'=>'Адрес почты указан неверно'],
            ['password','string','min'=>4],
            ['password2', 'compare','compareAttribute' => 'password'],
            ['name','errorIfMagic'],
            ['email','errorIfEmailUsed']

        ];
    }

    public function setUserRecord ($userRecord)
    {
        $this->name = $userRecord->user;
        $this->email = $userRecord->email;
        $this->password = $this->password2 = 'qvas';
    }

    public function errorIfMagic()
    {
        if ($this->name == 'Magic')
            $this->addError('name','No magic please!');
    }

    public function errorIfEmailUsed()
    {
        if ($this->hasErrors())
            return;
        if (UserRecord::existsEmail($this->email))

        $this->addError('email','This e-mail already exists');
    }
}