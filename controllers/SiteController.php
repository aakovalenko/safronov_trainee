<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;

class SiteController extends Controller
{
    public function actionIndex()
    {
        Yii::trace('I am here');
        return $this->render('index');
    }


}


