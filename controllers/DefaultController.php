<?php

namespace frenzelgmbh\cmentity\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Json;

use frenzelgmbh\appcommon\controllers\AppController;

use frenzelgmbh\cmentity\models\Entity;

class DefaultController extends AppController
{
  /**
   * Set the default layout to the modules view column2
   * @var string
   */
  public $layout = 'column2';
  
  /**
   * controlling the different access rights
   * @return [type] [description]
   */
  public function behaviors()
  {
    return [
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'delete' => ['post'],
        ],
      ],
      'AccessControl' => [
        'class' => '\yii\filters\AccessControl',
        'rules' => [
          [
            'allow'=>true,
            'actions'=>array(
              'index',
              'test',
              'create',
              'jsentity'
            ),
            'roles'=>array('@'),
          ],
          [
            'allow'=>true,
            'actions'=>array(              
              'test',
              'jsentity',
              'create'
            ),
            'roles'=>array('?'),
          ]
        ]
      ]
    ];
  }

  /**
   * [actionIndex description]
   * @return [type] [description]
   */
	public function actionIndex()
	{
    return $this->render('index');
	}

  /**
   * [actionTest description]
   * @return [type] [description]
   */
  public function actionTest()
  {
    return $this->render('test');
  }

  /**
   * [actionCreate description]
   * @param string module
   * @param integer id
   * @return view         [description]
   */
  public function actionCreate($module=NULL,$id=NULL){
    $model = new Entity;

    if ($model->load(Yii::$app->request->post()) && $model->save()) 
    {
      if (\Yii::$app->request->isAjax) 
      {
        header('Content-type: application/json');
        echo Json::encode(['status'=>'DONE','model'=>$model]);
        exit();
      }
      else
      {
        return $this->redirect(['view', 'id' => $model->id]);
      }
    } 
    else 
    {
      if(!is_null($module) && !is_null($id))
      {
        $model->mod_table = $module;
        $model->mod_id = $id;  
      }
      return $this->renderAjax('@frenzelgmbh/cmentity/widgets/views/iviews/_form', [
          'model' => $model,
      ]);
    }
  }

  /**
   * js(on)entity returns an json object for the select2 widget
   * @param  string $search Text for the lookup
   * @param  integer of the set value
   * @return json    [description]
   */
  public function actionJsentity($search = NULL,$id = NULL)
  {
    header('Content-type: application/json');
    $clean['more'] = false;

    $query = new Query;
    if(!is_Null($search))
    {
      $mainQuery = $query->select('id, name AS text')
        ->from('{{%entity}}')
        ->where('UPPER(name) LIKE "%'.strtoupper($search).'%"');

      $command = $mainQuery->createCommand();
      $rows = $command->queryAll();
      $clean['results'] = array_values($rows);
    }
    else
    {     
      if(!is_null($id))
      {
        $clean['results'] = ['id'=> $id,'text' => Entity::findOne($id)->name];
      }else
      {
        $clean['results'] = ['id'=> 0,'text' => 'None found'];
      }
    }
    echo Json::encode($clean);
    exit();
  }

}
