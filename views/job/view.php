<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\mainjob\models\MainJob */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'รายการ'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-job-view">

<div class="panel panel-success">
	<div class="panel-heading">
		<span class="panel-title"><?= Html::icon('eye').' '.Html::encode($this->title) ?></span>
		<?= Html::a( Html::icon('fire').' '.Yii::t('app', 'ลบ'), ['delete', 'id' => $model->stc_id], [
            'class' => 'btn btn-danger panbtn',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a( Html::icon('pencil').' '.Yii::t('app', 'อัพเดต'), ['update', 'id' => $model->stc_id], ['class' => 'btn btn-primary panbtn']) ?>
	</div>
	<div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
 			[
				'label' => $model->attributeLabels()['stc_id'],
				'value' => $model->stc_id,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['stc_name'],
				'value' => $model->stc_name,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['stc_name_eng'],
				'value' => $model->stc_name_eng,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['stc_detail'],
				'value' => $model->stc_detail,			
				//'format' => ['date', 'long']
			],
            [
                'label' => $model->attributeLabels()['created_at'],
                'value' => $model->created_at,
                'format' => ['date', 'long']
            ],
            [
                'label' => $model->attributeLabels()['created_by'],
                'value' => $model->createdBy->fullname,
                //'format' => ['date', 'long']
            ],
            [
                'label' => $model->attributeLabels()['updated_at'],
                'value' => $model->updated_at,
                'format' => ['date', 'long']
            ],
            [
                'label' => $model->attributeLabels()['updated_by'],
                'value' => $model->updatedBy->fullname,
                //'format' => ['date', 'long']
            ],
    	],
    ]) ?>
	</div>
</div>
</div>