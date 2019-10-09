<?php

$this->title = Yii::$app->user->identity->username."' Profile";
$this->params['breadcrumbs'][] = 'Profile';

use yii\bootstrap\Html;

?>

<div class="profile">
    <div class="row">
        <div class="col-md-4">
            <?= Html::img('@web/images/'.Yii::$app->user->identity->username.'.jpg', [
                'alt' => Yii::$app->user->identity->username."'s Profile Photo",
                'class' => 'img-responsive',
            ]); ?>

            <?= Html::tag('h2', Yii::$app->user->identity->username); ?>
        </div>

        <div class="col-md-8">
            Content
        </div>
    </div>
</div>
