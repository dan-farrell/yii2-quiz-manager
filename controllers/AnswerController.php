<?php

namespace app\controllers;

use yii\data\ArrayDataProvider;
use yii\web\Controller;
use app\models\Answer;

/**
 *
 */
class AnswerController extends Controller
{

  public function actionCreate()
  {
    $answer = new Answer();
    $answer->load($_POST);
    $answer->save();

    return $this->redirect(['quiz/index']);
  }

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

  public function actionUpdate($id)
  {
    $answer = Answer::find()
      ->where(['answer_id' => $id])
      ->one();

    $answer->load($_POST);
    $answer->save();

    return $this->redirect(['quiz/index']);
  }

  public function actionDelete($id)
  {
    $answer = Answer::find()
      ->where(['answer_id' => $id])
      ->one();

    $answer->delete();

    return $this->redirect(['quiz/index']);
  }

}
