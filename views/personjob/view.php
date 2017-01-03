<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\mainjob\models\PersonJob */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Person Jobs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-job-view">

	<div class="panel panel-success">
		<div class="panel-heading">
			<span class="panel-title"><?= Html::icon('eye').' '.Html::encode($this->title) ?></span>
			<?= Html::a( Html::icon('fire').' '.Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
				'class' => 'btn btn-danger panbtn',
				'data' => [
					'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
					'method' => 'post',
				],
			]) ?>
			<?= Html::a( Html::icon('pencil').' '.Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary panbtn']) ?>
		</div>
		<div class="panel-body">
			<?= DetailView::widget([
				'model' => $model,
				'attributes' => [
					[
						'label' => $model->attributeLabels()['id'],
						'value' => $model->id,
						//'format' => ['date', 'long']
					],
					[
						'label' => $model->attributeLabels()['person_id'],
						'value' => $model->person->fullname,
						//'format' => ['date', 'long']
					],
					[
						'label' => $model->attributeLabels()['job'],
//						'value' => $this->context->listjobinfo($model->id),
						'value' => $model->jobInfoList,
						'format' => ['raw']
					],
				],
			]) ?>
		</div>
	</div>
</div>