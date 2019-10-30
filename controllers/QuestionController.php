<?php

namespace app\controllers;

use yii\data\ArrayDataProvider;
use yii\web\Controller;

// Models
use app\models\Answer;
use app\models\Question;
use app\models\Quiz;

/**
 *
 */
class QuestionController extends Controller
{

  public function actionCreate()
  {
    $question = new Question();
    $question->load($_POST);
    $question->save();

    return $this->redirect(['quiz/index']);
  }

  public function actionDelete($id)
  {
    // $answer = Answer::find()
    //   ->where(['question_id' => $id])
    //   ->all();

    // $answer->delete();

    $question = Question::find()
      ->where(['question_id' => $id])
      ->one();

    $question->delete();

    return $this->redirect(['quiz/index']);
  }

}
