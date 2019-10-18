<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use app\assets\AppAsset;
use app\widgets\Alert;

AppAsset::register($this);

$this->beginPage();

?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head><!-- /header -->

    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?= $this->render('/app/nav'); ?>

            <div class="container">
                <?php
                echo Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]);
                echo Alert::widget();
                echo $content;
                ?>
            </div><!-- /.container -->
        </div><!-- /.wrap -->

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y'); ?></p>
                <p class="pull-right"><?= Yii::powered(); ?></p>
            </div><!-- /.container -->
        </footer><!-- /.footer -->

        <?php $this->endBody(); ?>
    </body><!-- /body -->
</html><!-- /html -->

<?php $this->endPage();
