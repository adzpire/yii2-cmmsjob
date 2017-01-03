<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

use kartik\widgets\Select2;
/*use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
*/
/* @var $this yii\web\View */
/* @var $model backend\modules\mainjob\models\PersonJob */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-job-form">

	<?php $form = ActiveForm::begin([
		'layout' => 'horizontal',
		'id' => 'person-job-form',
		'fieldConfig' => [
			'horizontalCssClasses' => [
				'label' => 'col-md-4',
				'wrapper' => 'col-sm-8',
			],
		],
		//'validateOnChange' => true,
		//'enableAjaxValidation' => true,
		//	'enctype' => 'multipart/form-data'
	]); ?>

    <?php
    echo $form->field($model, 'person_id')->widget(Select2::classname(), [
        'data' => $personlist,
        'options' => ['placeholder' => 'เลือกบุคลากร'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);
    ?>
	<?php
	echo $form->field($model, 'job')->widget(Select2::classname(), [
		'data' => $jobs,
		'options' => ['placeholder' => 'ระบุงาน'],
		'pluginOptions' => [
			'allowClear' => true,
			'multiple' => true,
		],
	]);
	?>

	<?php 		/* adzpire form tips
		$form->field($model, 'wu_tel', ['enableAjaxValidation' => true])->textInput(['maxlength' => true]);
		//file field
				echo $form->field($model, 'file',[
		'addon' => [
       
'append' => !empty($model->wt_image) ? [
			'content'=> Html::a( Html::icon('download').' '.Yii::t('app', 'download'), Url::to('@backend/web/'.$model->wt_image), ['class' => 'btn btn-success', 'target' => '_blank']), 'asButton'=>true] : false
    ]])->widget(FileInput::classname(), [
			//'options' => ['accept' => 'image/*'],
			'pluginOptions' => [
				'showPreview' => false,
				'showCaption' => true,
				'showRemove' => true,
				'initialCaption'=> $model->isNewRecord ? '' : $model->wt_image,
				'showUpload' => false
			]
]);
		*/
	?>     <div class="form-group text-center">
		<?= Html::submitButton( Html::icon('floppy-disk').' '.Yii::t('app', 'บันทึก'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?php /*if(!$model->isNewRecord){ echo Html::resetButton( Html::icon('refresh').' '.Yii::t('app', 'Reset') , ['class' => 'btn btn-warning']);} */
		echo Html::a( Html::icon('ban-circle').' '.Yii::t('app', 'ยกเลิก'), Yii::$app->request->referrer, ['class' => 'btn btn-warning']);
		?>

	</div>

	<?php ActiveForm::end(); ?>

</div>
