<?php

use yii\bootstrap\Dropdown;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

$navItems = [
  ['label' => 'About', 'url' => ['/site/about']],
  ['label' => 'Quiz', 'url' => ['/quiz/index']],
];

$adminMenu = [];

$adminItems = ['label' => 'Logout', 'url' => ['/site/logout']];

array_push($adminMenu, $adminItems);

// Merge the $navItems and the $adminMenu
$navItems = array_merge($navItems, $adminMenu);

// foreach ($navItems as $item) {
//   echo '<div class="col-md-6"><a href="'.$item['url'].'">'.$item['label'].'</a></div>';
// }

foreach ($navItems as $item) { ?>
  <div class="col-md-6">
    <?= $item['label']; ?>
  </div>
<?php } ?>
