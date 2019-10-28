<?php

namespace app\controllers;

use yii\data\ArrayDataProvider;
use yii\web\Controller;

// Models
use app\models\Question;
use app\models\Quiz;

/**
 *
 */
class QuizController extends Controller
{

  /**
   * Displays quiz page.
   *
   * @return string
   */
  public function actionIndex()
  {
    $query = Quiz::find()
      ->orderBy(['quiz_id' => SORT_ASC])
      ->all();

    $dataProvider = new ArrayDataProvider(['allModels' => $query]);

    return $this->render('index', ['dataProvider' => $dataProvider]);
  }

  public function actionView()
  {
    $query = Question::find()
      ->andWhere(['quiz_id' => '2'])
      ->orderBy(['question_id' => SORT_ASC])
      ->all();

    $dataProvider = new ArrayDataProvider(['allModels' => $query]);

    return $this->render('view', ['dataProvider' => $dataProvider]);
  }

  public function actionCreate()
  {
    return $this->render('create');
  }

  public function actionEdit()
  {
    return 'edit';
  }

  public function actionDelete()
  {
    return 'delete';
  }

}
