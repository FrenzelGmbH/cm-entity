<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\ActiveForm;

//suppress reload of existing asstes in main window
$this->assetBundles['yii\bootstrap\BootstrapAsset'] = new yii\web\AssetBundle;

/**
 * @var yii\web\View $this
 * @var app\models\EntityType $model
 * @var yii\widgets\ActiveForm $form
 */

$script = <<<SKRIPT

$('#submitEntityType').on('click',function(event){
  $('#EntityTypeForm').ajaxSubmit(
  {
    type : "POST",
    success: function(data){
      appendenttype(data);
      $('#centitytype').modal('hide');
    }
  });
  event.preventDefault();
});

SKRIPT;

$this->registerJs($script);

?>

<div class="entity-type-form">

    <?php $form = ActiveForm::begin([
        'action' => Url::to(['/entity/entity-type/create']),
        'id' => 'EntityTypeForm'
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','id'=>'submitEntityType']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
