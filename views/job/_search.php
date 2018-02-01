<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\mainjob\models\MainJobSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="main-job-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'stc_id') ?>

    <?= $form->field($model, 'stc_name') ?>

    <?= $form->field($model, 'stc_name_eng') ?>

    <?= $form->field($model, 'stc_detail') ?>

    <div class="form-group">
        <?= Html::submitButton(Html::icon('search').' '.Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Html::icon('refresh').' '.Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
