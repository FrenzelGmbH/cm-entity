<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\categories\models\Entity $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Entity',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
