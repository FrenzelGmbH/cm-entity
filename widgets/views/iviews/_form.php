<?php

use yii\helpers\Url;
use kartik\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\Select2;

use yii\bootstrap\Modal;
use frenzelgmbh\cmentity\models\EntityType;

/**
 * @var yii\web\View $this
 * @var frenzelgmbh\cmentity\models\Entity $model
 * @var yii\widgets\ActiveForm $form
 */

$script = <<<SKRIPT

$('#submitEntityCreate').on('click',function(event){
  $('#EntityCreateForm').ajaxSubmit(
  {
    type : "POST",
    success: function(data){
      $('#centitytype').modal('hide');
    }
  });
  event.preventDefault();
});

SKRIPT;

$this->registerJs($script);

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

appendenttype = function(data){
    var model = data.model;
    $('#entity-entity_type_id').append('<option value="' + model.id + '">' + model.name + '</option>');
}

opencentitytypemod = function(){
    var th=$(this), id=th.attr('id').slice(0);  
    $('#centitytype').modal('show');
    $('#centitytype div.modal-header').html('Add Entity');
    $('#centitytype div.modal-body').load(th.attr('href'));
    return false;
};

$('#mod_entity_type_add').on('click',opencentitytypemod);

MODALJS;

  $this->registerJs($modalJS);

?>

<div class="entity-form">

    <?php $form = ActiveForm::begin([
      'id' => 'EntityCreateForm',
      'action' => Url::to(['/entity/default/create']),
    ]); ?>

    <div class="row">
        <div class="col-md-12">
    <?php
        echo $form->field($model, 'entity_type_id')->widget(Select2::classname(), [
            'data' => EntityType::pdEntityType(),
            'options' => [
                'placeholder' => 'Entity Type...'                
            ],
            'addon' => [
                'prepend' => [
                    'content' => Html::icon('globe')
                ],
                'append' => [
                    'content' => Html::button(Html::icon('plus'), [
                        'class'=>'btn btn-default',
                        'id'   => 'mod_entity_type_add', 
                        'title'=>'add new entity', 
                        'data-toggle'=>'tooltip',
                        'href' => Url::to(['/entity/entity-type/create'])
                    ]),
                    'asButton'=>true
                ]
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]);
    ?>
        </div>
    </div>

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

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','id'=>'submitEntityCreate']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
