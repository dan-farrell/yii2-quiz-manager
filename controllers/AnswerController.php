<?php

namespace app\controllers;

/**
 * @author Dan Farrell <farrell.d@live.co.uk>
 * @copyright 2019 All rights reserved
 */

use yii\data\ArrayDataProvider;
use yii\web\Controller;
use app\models\Answer;

class AnswerController extends Controller
{

  /**
   * Create Answer action.
   *
   * @return redirect
   */
  public function actionCreate()
  {
    $answer = new Answer();
    $answer->load($_POST);

    $answer->save();

    return $this->redirect(['quiz/index']);
  }

  /**
   * Edit Answer action.
   *
   * @return string
   */
  public function actionEdit($id)
  {
    $answer = Answer::find()
      ->where(['answer_id' => $id])
      ->one();

    return $this->render('edit-form', [
      'answer' => $answer,
      'id' => $id,
    ]);
  }

  /**
   * Update Answer in database action.
   *
   * @return redirect
   */
  public function actionUpdate($id)
  {
    $answer = Answer::find()
      ->where(['answer_id' => $id])
      ->one();

    $answer->load($_POST);

    $answer->save();

    return $this->redirect(['quiz/index']);
  }

  /**
   * Delete Answer action.
   *
   * @return redirect
   */
  public function actionDelete($id)
  {
    $answer = Answer::find()
      ->where(['answer_id' => $id])
      ->one();

    $answer->delete();

    return $this->redirect(['quiz/index']);
  }

}
