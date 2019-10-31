<?php

namespace app\controllers;

use yii\data\ArrayDataProvider;
use yii\web\Controller;
use app\models\Answer;
use app\models\Question;

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

  public function actionEdit($id)
  {
    $question = Question::find()
      ->where(['question_id' => $id])
      ->one();

    return $this->render('edit-form', [
      'question' => $question,
      'id' => $id,
    ]);
  }

  public function actionUpdate($id)
  {
    $question = Question::find()
      ->where(['question_id' => $id])
      ->one();

    $question->load($_POST);
    $question->save();

    return $this->redirect(['quiz/index']);
  }

  public function actionView($id)
  {
    $title = $this->getQuestionTitle($id);
    $questionId = $id;

    $query = Answer::find()
      ->andWhere(['question_id' => $id])
      ->orderBy(['answer_id' => SORT_ASC])
      ->all();

    $dataProvider = new ArrayDataProvider(['allModels' => $query]);

    $answer = new Answer();

    return $this->render('view', [
      'dataProvider' => $dataProvider,
      'title' => $title,
      'questionId' => $id,
      'answer' => $answer,
    ]);
  }

  public function actionDelete($id)
  {
    $question = Question::find()
      ->where(['question_id' => $id])
      ->one();

    $question->delete();

    return $this->redirect(['quiz/index']);
  }

  public function getQuestionTitle($id)
  {
    $query = Question::find()
      ->andWhere(['question_id' => $id])
      ->all();

    foreach ($query as $item) {
      return $item['name'];
    }
  }

}
