<?php

use yii\bootstrap\Html;
//use kartik\widgets\DatePicker;

use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\mainjob\models\PersonJobSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-job-index">

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<?= GridView::widget([
		//'id' => 'kv-grid-demo',
		'dataProvider'=> $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			//['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'headerOptions' => [
                    'width' => '50px',
                ],
            ],
			[
				'attribute' => 'person_id',
				'value' => 'person.fullname',
			],
			[
				'attribute'=> 'job',
				'value' => function ($model, $key, $index) {
					return $model->jobInfoList;
				},
				'format'=>'raw',
			],
//			'created_at',
//			'created_by',
			// 'updated_at',
			// 'updated_by',
			[
				'class' => 'yii\grid\ActionColumn',
                'headerOptions' => [
                    'width' => '70px',
                ],
				/*'visibleButtons' => [
                    'view' => Yii::$app->user->id == 122,
                    'update' => Yii::$app->user->id == 19,
                    'delete' => function ($model, $key, $index) {
                                    return $model->status === 1 ? false : true;
                                }
                    ],
                'visible' => Yii::$app->user->id == 19,*/
			],
		],
		'pager' => [
			'firstPageLabel' => Yii::t('app', 'รายการแรกสุด'),
			'lastPageLabel' => Yii::t('app', 'รายการท้ายสุด'),
		],
		'responsive'=>true,
		'hover'=>true,
		'toolbar'=> [
			['content'=>
				Html::a(Html::icon('plus'), ['create'], ['class'=>'btn btn-success', 'title'=>Yii::t('app', 'เพิ่ม')]).' '.
				Html::a(Html::icon('repeat'), ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('app', 'Reset Grid')])
			],
			//'{export}',
			'{toggleData}',
		],
		'panel'=>[
			'type'=>GridView::TYPE_INFO,
			'heading'=> Html::icon('briefcase').' '.Html::encode($this->title),
		],
	]); ?>
	<?php 	 /* adzpire grid tips
		[
				'attribute' => 'id',
				'headerOptions' => [
					'width' => '50px',
				],
			],
		[
		'attribute' => 'we_date',
		'value' => 'we_date',
			'filter' => DatePicker::widget([
					'model'=>$searchModel,
					'attribute'=>'date',
					'language' => 'th',
					'options' => ['placeholder' => Yii::t('app', 'enterdate')],
					'type' => DatePicker::TYPE_COMPONENT_APPEND,
					'pickerButton' =>false,
					//'size' => 'sm',
					//'removeButton' =>false,
					'pluginOptions' => [
						'autoclose' => true,
						'format' => 'yyyy-mm-dd'
					]
				]),
			//'format' => 'html',			
			'format' => ['date']

		],	
		[
			'attribute' => 'we_creator',
			'value' => 'weCr.userPro.nameconcatened'
		],
	 */
	?>
</div>
