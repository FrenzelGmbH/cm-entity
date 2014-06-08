<?php

use yii\helpers\Url;
use kartik\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\Select2;

use yii\bootstrap\Modal;

/**
 * @var yii\web\View $this
 * @var app\modules\categories\models\Entity $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<?php 
  
Modal::begin([
  'id'=>'centitytype',
  'header' => '<i class="fa fa-info"></i>Loading...',
  'closeButton' => ['tag'=>'button','label'=>'close']
]);
echo 'pls. wait one moment...';
Modal::end();

$modalJS = <<<MODALJS

appendcomtype = function(data){
    var model = data.model;
    $('#communication-communication_type_id').append('<option value="' + model.id + '">' + model.name + '</option>');
}

opencentitytypemod = function(){
    var th=$(this), id=th.attr('id').slice(0);  
    $('#centitytype').modal('show');
    $('#centitytype div.modal-header').html('Add Address');
    $('#centitytype div.modal-body').load(th.attr('href'));
    return false;
};

$('#mod_communication_type_add').on('click',opencentitytypemod);

MODALJS;

  $this->registerJs($modalJS);

?>

<div class="entity-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'prename')->textInput(['maxlength' => 100]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 140]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name_two')->textInput(['maxlength' => 100]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'name_three')->textInput(['maxlength' => 100]) ?>
        </div>
    </div>    

    <?= $form->field($model, 'param_date')->textInput() ?>

    <?= $form->field($model, 'param_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'official_one')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'official_two')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'mod_id')->textInput() ?>

    <?= $form->field($model, 'system_upate')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'deleted_at')->textInput() ?>

    <?= $form->field($model, 'entity_type_id')->textInput() ?>
    
    <?= $form->field($model, 'mod_table')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'system_key')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'system_name')->textInput(['maxlength' => 100]) ?>

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
