<?php

use yii\bootstrap\Dropdown;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

// Array containing navigation options
$navItems = [
    ['label' => 'Home', 'url' => ['/site/index']],
    ['label' => 'About', 'url' => ['/site/about']],
    ['label' => 'Contact', 'url' => ['/site/contact']]
];

// Blank array for the admin menu items
$adminMenu = [];

// If statement checking whether the user is guest or not
if (Yii::$app->user->isGuest) {
    // Create $navItems
    $adminItems = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    // Create $navItems
    $adminItems = '<li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Account ('.Yii::$app->user->identity->username.')</a>'.Dropdown::widget([
            'items' => [
                ['label' => 'Profile', 'url' => ['/profile/index']],
                ['label' => 'Red', 'url' => ['#']],
                '<li>'.Html::beginForm(['/site/logout'], 'post').Html::submitButton('Logout', ['class' => 'btn btn-link logout']).Html::endForm().'</li>',
            ],
        ]);
    '</li>';
}

// Push the $navItems to the end of the blank $adminMenu
array_push($adminMenu, $adminItems);

// Merge the $navItems and the $adminMenu
$navItems = array_merge($navItems, $adminMenu);

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => ['class' => 'navbar-inverse navbar-fixed-top'],
]);

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $navItems,
]);

NavBar::end();
