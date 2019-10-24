<?php

$this->title = Yii::$app->user->identity->username."' Profile";
$this->params['breadcrumbs'][] = 'Profile';

use yii\bootstrap\Html;
use app\models\Profile;

// Yii2 Query to get the data for specific user using the logged in users name
$profile = Profile::find()
  ->where(['name' => Yii::$app->user->identity->username])
  ->one();

// $things = [
//   [
//     'foo' => 5.5,
//     'bar' => 'abc',
//   ],
//   [
//     'foo' => 7.7,
//     'bar' => 'xyz',
//   ],
//   [
//     'foo' => 2.2,
//     'bar' => 'efg',
//   ]
// ];

if (!empty($profile->img)) {
  $profileImg = $profile->img;
} else {
  $profileImg = '/images/person-placeholder.png';
}

if (!empty($profile->color)) {
  $profileColor = $profile->color;
} else {
  $profileColor = '#878787';
}

?>

<div class="profile">
  <div class="row">
    <div class="col-md-3">
      <?php
      echo Html::img('@web'.$profileImg, [
        'alt' => Yii::$app->user->identity->username."'s Profile Photo",
        'class' => 'img-responsive',
        'style' => 'background-color: '.$profileColor,
      ]);

      echo Html::tag('h2', ucfirst(Yii::$app->user->identity->username));

      if (!empty($profile->place)) {
        echo Html::tag('p', $profile->place);
      }

      if (!empty($profile->age)) {
        echo Html::tag('p', $profile->age);
      }
      ?>

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit</button>
    </div><!-- /.col-md-3 -->

    <div class="col-md-9">
      <?php if (!empty($profile->desc)) {
        echo $profile->desc;
      } ?>
    </div><!-- /.col-md-9 -->
  </div><!-- /.row -->
</div><!-- /.profile -->

<?= $this->render('/profile/components/modal', ['profile' => $profile]); ?>
