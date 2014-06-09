<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\EntityType $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Entity Type',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entity Types'), 'url' => ['/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entity-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
