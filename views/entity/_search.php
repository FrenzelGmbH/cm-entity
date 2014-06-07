<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\categories\models\EntitySearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="entity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'prename') ?>

    <?= $form->field($model, 'name_two') ?>

    <?= $form->field($model, 'name_three') ?>

    <?php // echo $form->field($model, 'official_one') ?>

    <?php // echo $form->field($model, 'official_two') ?>

    <?php // echo $form->field($model, 'param_date') ?>

    <?php // echo $form->field($model, 'param_text') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'mod_table') ?>

    <?php // echo $form->field($model, 'mod_id') ?>

    <?php // echo $form->field($model, 'system_key') ?>

    <?php // echo $form->field($model, 'system_name') ?>

    <?php // echo $form->field($model, 'system_upate') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>

    <?php // echo $form->field($model, 'entity_type_id') ?>

    <?php // echo $form->field($model, 'entity_relation_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
