<?php

use yii\bootstrap\Html;
//use kartik\widgets\DatePicker;

use kartik\dynagrid\DynaGrid;
$this->registerCss('
.grid-view td {
    white-space: unset;
}
');
?>
<div class="mainjob-default-index col-md-6">
<?= DynaGrid::widget([
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
    'theme'=>'panel-info',
    'showPersonalize'=>true,
	'storage' => 'session',
	'toggleButtonGrid' => [
		'label' => '<span class="glyphicon glyphicon-wrench">ปรับแต่งตาราง</span>'
	],
    'gridOptions'=>[
        'dataProvider'=>$dataProvider,
        'filterModel'=>$searchModel,
        // 'showPageSummary'=>true,
        // 'floatHeader'=>true,
		'pjax'=>true,
		'hover'=>true,
		'pager' => [
			'firstPageLabel' => Yii::t('app', 'รายการแรกสุด'),
			'lastPageLabel' => Yii::t('app', 'รายการท้ายสุด'),
		],
		'resizableColumns'=>true,
        'responsiveWrap'=>false,
        'responsive'=>true,
        'panel'=>[
            'heading'=> Html::icon('briefcase').' '.Html::encode($this->title),
            // 'before' =>  '<div style="padding-top: 7px;"><em>* The table header sticks to the top in this demo as you scroll</em></div>',
			'after' => false,			
        ],
        'toolbar' =>  [
            ['content'=>
                Html::a(Html::icon('repeat'), ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('app', 'Reset Grid')])
            ],                   
            ['content'=>'{dynagrid}'],
            '{toggleData}', 
		],
		
    ],
    'options'=>['id'=>'dynagrid-mjdefindex1'] // a unique identifier is important
]); ?>
    
</div>
<div class="person-job-index col-md-6">
<?= DynaGrid::widget([
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
    'theme'=>'panel-primary',
    'showPersonalize'=>true,
	'storage' => 'session',
	'toggleButtonGrid' => [
		'label' => '<span class="glyphicon glyphicon-wrench">ปรับแต่งตาราง</span>'
	],
    'gridOptions'=>[
        'dataProvider'=> $pjdataProvider,
        'filterModel' => $pjmdl,
        // 'showPageSummary'=>true,
        // 'floatHeader'=>true,
		'pjax'=>true,
		'hover'=>true,
		'pager' => [
			'firstPageLabel' => Yii::t('app', 'รายการแรกสุด'),
			'lastPageLabel' => Yii::t('app', 'รายการท้ายสุด'),
		],
		'resizableColumns'=>true,
        'responsiveWrap'=>false,
        'responsive'=>true,
        'panel'=>[
            'heading'=> Html::icon('user').' บุคลากรกับงาน',
            // 'before' =>  '<div style="padding-top: 7px;"><em>* The table header sticks to the top in this demo as you scroll</em></div>',
			'after' => false,			
        ],
        'toolbar' =>  [
            ['content'=>
                Html::a(Html::icon('repeat'), ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('app', 'Reset Grid')])
            ],                   
            ['content'=>'{dynagrid}'],
            '{toggleData}', 
		],
		
    ],
    'options'=>['id'=>'dynagrid-mjdefindex2'] // a unique identifier is important
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