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

    <?php $this->registerCsrfMetaTags(); ?>
    <title><?= Html::encode($this->title); ?></title>
    <?php $this->head(); ?>

    <script src="https://kit.fontawesome.com/a2d0b4512b.js" crossorigin="anonymous"></script>
  </head><!-- /header -->

  <body id="body">
    <?php $this->beginBody(); ?>

    <div class="wrap">
      <?php if (!Yii::$app->user->isGuest) {
        echo $this->render('/app/nav');
      } ?>

      <div class="container">
        <?= $content; ?>
      </div><!-- /.container -->
    </div><!-- /.wrap -->

    <?php if (!Yii::$app->user->isGuest) {
      echo $this->render('/app/footer');
    } ?>

    <?php $this->endBody(); ?>
  </body><!-- /body -->
</html><!-- /html -->

<?php $this->endPage(); ?>
