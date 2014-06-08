<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\categories\models\Entity $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="entity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'param_date')->textInput() ?>

    <?= $form->field($model, 'param_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'mod_id')->textInput() ?>

    <?= $form->field($model, 'system_upate')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'deleted_at')->textInput() ?>

    <?= $form->field($model, 'entity_type_id')->textInput() ?>

    <?= $form->field($model, 'entity_relation_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 140]) ?>

    <?= $form->field($model, 'prename')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'name_two')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'name_three')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'mod_table')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'system_key')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'system_name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'official_one')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'official_two')->textInput(['maxlength' => 60]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
