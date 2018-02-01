<?php

use yii\bootstrap\Html;
//use kartik\widgets\DatePicker;

use kartik\grid\GridView;
$this->registerCss('
.grid-view td {
    white-space: unset;
}
');
?>
<div class="mainjob-default-index col-md-6">
    <?= GridView::widget([
        //'id' => 'kv-grid-demo',
        'dataProvider'=> $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'stc_id',
                'headerOptions' => [
                    'width' => '50px',
                ],
            ],
            'stc_name',
            'stc_name_eng',
            'stc_detail:ntext',
        ],
        'pager' => [
            'firstPageLabel' => Yii::t('app', 'รายการแรกสุด'),
            'lastPageLabel' => Yii::t('app', 'รายการท้ายสุด'),
        ],
        'responsive'=>true,
        'hover'=>true,
        'toolbar'=> [
            ['content'=>
                //Html::a(Html::icon('plus'), ['create'], ['class'=>'btn btn-success', 'title'=>Yii::t('app', 'เพิ่ม')]).' '.
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
</div>
<div class="person-job-index col-md-6">

    <?= GridView::widget([
        //'id' => 'kv-grid-demo',
        'dataProvider'=> $pjdataProvider,
        'filterModel' => $pjmdl,
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
        ],
        'pager' => [
            'firstPageLabel' => Yii::t('app', 'รายการแรกสุด'),
            'lastPageLabel' => Yii::t('app', 'รายการท้ายสุด'),
        ],
        'responsive'=>true,
        'hover'=>true,
        'toolbar'=> [
            ['content'=>
                //Html::a(Html::icon('plus'), ['create'], ['class'=>'btn btn-success', 'title'=>Yii::t('app', 'เพิ่ม')]).' '.
                Html::a(Html::icon('repeat'), ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('app', 'Reset Grid')])
            ],
            //'{export}',
            '{toggleData}',
        ],
        'panel'=>[
            'type'=>GridView::TYPE_PRIMARY,
            'heading'=> Html::icon('user').' บุคลากรกับงาน',
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