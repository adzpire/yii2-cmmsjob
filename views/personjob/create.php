<?php

use yii\bootstrap\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\mainjob\models\PersonJob */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'หน้ารายการ'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-job-create">

    <div class="panel panel-primary">
		<div class="panel-heading">
			<span class="panel-title"><?= Html::icon('edit').' '.Html::encode($this->title) ?></span>
			<?= Html::a( Html::icon('list-alt').' '.Yii::t('app', 'entry'), ['index'], ['class' => 'btn btn-success panbtn']) ?>
		</div>
		<div class="panel-body">
		 <?= $this->render('_form', [
			  'model' => $model,
			  'jobs' => $jobs,
			  'personlist' => $personlist,
		 ]) ?>
		</div>
	</div>

</div>
