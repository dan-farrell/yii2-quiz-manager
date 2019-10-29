<?php

use yii\bootstrap\Dropdown;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

// Array containing navigation options
$navItems = [
  ['label' => 'About', 'url' => ['/site/about']],
  ['label' => 'Quiz', 'url' => ['/quiz/index']],
];

// Blank array for the admin menu items
$adminMenu = [];

// Create $navItems
$adminItems = ['label' => 'Login', 'url' => ['/site/login']];

// Push the $navItems to the end of the blank $adminMenu
array_push($adminMenu, $adminItems);

// Merge the $navItems and the $adminMenu
$navItems = array_merge($navItems, $adminMenu);

// foreach ($navItems as $item) {
//   echo '<div class="col-md-6"><a href="'.$item['url'].'">'.$item['label'].'</a></div>';
// }

echo 'tile for nav goes here';
