<?php

use yii\bootstrap\Dropdown;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => ['class' => 'navbar-inverse navbar-fixed-top'],
]);

$navItems = [
    ['label' => 'Home', 'url' => ['/site/index']],
    ['label' => 'About', 'url' => ['/site/about']],
    ['label' => 'Contact', 'url' => ['/site/contact']]
];

$adminMenu = [];

if (Yii::$app->user->isGuest) {
    array_push($adminMenu, ['label' => 'Login', 'url' => ['/site/login']]);
} else {
    $form = '<li>'.Html::beginForm(['/site/logout'], 'post').Html::submitButton(
        'Logout ('.Yii::$app->user->identity->username.')',
        ['class' => 'btn btn-link logout']
    ).Html::endForm().'</li>';

    $dropdown = '<li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Account</a>'.Dropdown::widget([
            'items' => [
                ['label' => 'Admin', 'url' => ['/site/admin/index']],
                $form,
            ],
        ]);
    '</li>';

    array_push($adminMenu, $dropdown);
}

$navItems = array_merge($navItems, $adminMenu);

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $navItems,
]);

NavBar::end();
