<?php

$this->title = Yii::$app->user->identity->username."' Profile";
$this->params['breadcrumbs'][] = 'Profile';

use yii\bootstrap\Html;
use app\models\Profile;

// Yii2 Query to get the data for specific user using the logged in users name
$profile = Profile::find()
    ->where(['name' => Yii::$app->user->identity->username])
    ->one();

?>

<div class="profile">
    <div class="row">
        <div class="col-md-3">
            <?php
            echo Html::img('@web'.$profile->img, [
                'alt' => Yii::$app->user->identity->username."'s Profile Photo",
                'class' => 'img-responsive',
            ]);

            echo Html::tag('h2', ucfirst(Yii::$app->user->identity->username));
            echo Html::tag('p', $profile->place);
            echo Html::tag('p', $profile->age);
            ?>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit</button>
        </div>

        <div class="col-md-9">
            <?= $profile->desc; ?>
        </div>
    </div>
</div><!-- /.profile -->

<?= $this->render('/profile/components/modal', ['profile' => $profile]); ?>
