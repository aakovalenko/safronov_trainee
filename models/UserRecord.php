<?php

namespace  app\models;

use yii\db\ActiveRecord;

class UserRecord extends ActiveRecord
{
    public static function tableName()
    {
        return "user";
    }

    public function setTestUser()
    {
        $this->name = "John";
        $this->email = "john@john.john";
        $this->passhash = "SHA512 HASH HASH HASH";
        $this->status = 2;
    }
}