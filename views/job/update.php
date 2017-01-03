<?php

use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $model adzpire\job\models\MainJob */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Main Jobs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stc_id, 'url' => ['view', 'id' => $model->stc_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="main-job-update">

<div class="panel panel-warning">
	<div class="panel-heading">
		<span class="panel-title"><?= Html::icon('edit').' '.Html::encode($this->title) ?></span>
		<?= Html::a( Html::icon('fire').' '.Yii::t('app', 'Delete'), ['delete', 'id' => $model->stc_id], [
            'class' => 'btn btn-danger panbtn',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a( Html::icon('pencil').' '.Yii::t('app', 'createnew'), ['create'], ['class' => 'btn btn-info panbtn']) ?>
	</div>
	<div class="panel-body">
	<?= $this->render('_form', [
	  'model' => $model,
	]) ?>
	</div>
</div>

</div>
