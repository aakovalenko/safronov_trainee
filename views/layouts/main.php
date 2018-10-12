<?php
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

?>
<?php $this->beginPage();?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Safronov</title>

    <?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody(); ?>
<?php


NavBar::begin([
        'brandLabel' => 'Safronov',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
            'class' => 'navbar-default navbar-fixed-top'
    ]
]);
    if (Yii::$app->user->isGuest)
    $menu = [
    ['label' => 'Join','url' => ['/user/join']],
    ['label' => 'Login', 'url' => ['/user/login']]
];
    else
        $menu = [
            ['label' => Yii::$app->user->getIdentity()->name],
            ['label' => 'Logout', 'url' => ['/user/logout']]
        ];

echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menu
    ]);
Navbar::end();
?>

<div class="container" style="...">
<?= $content ?>
</div>
