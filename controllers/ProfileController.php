<?php

namespace app\controllers;

use yii\web\Controller;

/**
 *
 */
class ProfileController extends Controller
{

    /**
     * Displays profile page.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}
