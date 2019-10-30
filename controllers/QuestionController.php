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

  // public function actionCreate()
  // {
  //   $quiz = new Question();
  //   $quiz->load($_POST);
  //   $quiz->save();

  //   return $this->render('create');
  // }

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
