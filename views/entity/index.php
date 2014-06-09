<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\categories\models\EntitySearch $searchModel
 */

$this->title = Yii::t('app', 'Entities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Entity',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'prename',
            'name_two',
            'name_three',
            // 'official_one',
            // 'official_two',
            // 'param_date',
            // 'param_text:ntext',
            // 'user_id',
            // 'mod_table',
            // 'mod_id',
            // 'system_key',
            // 'system_name',
            // 'system_upate',
            // 'created_at',
            // 'updated_at',
            // 'deleted_at',
            // 'entity_type_id',
            // 'entity_relation_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
