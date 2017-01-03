<?php
/**
 * Created by PhpStorm.
 * User: cmmsNetAdmin
 * Date: 8/1/2559
 * Time: 20:10
 */
use yii\helpers\Url;
use yii\bootstrap\Html;
use yii\bootstrap\Alert;
use yii\bootstrap\Button;

$test = Url::remember(Url::current());
//echo $test;
?>
<style>
    legend {
        margin-bottom: 5px;
        font-size: 16px;
    }
</style>
<?php
Alert::begin([
    'options' => [
        'class' => 'alert-custom',
    ],
]);
?>
<strong><?php echo Html::icon('info-sign'); ?> -: มีการอัพเดตระบบ :- </strong>
<?php echo Button::widget([
    'label' => 'แสดงรายละเอียด',
    'options' => [
        'class' => 'btn-xs btn-primary',
        'data-toggle' => 'collapse',
        'data-target' => '#demo',
    ],
]);
echo Html::a('ปิดการแจ้งเตือน 30 วัน', ['/tc/default/setvercookies'],
    [
        'class' => 'btn btn-xs btn-danger',
    ]);
?>
<!--<a id="blink" data-original-title="ปิดการแจ้งเตือน 30 วัน" data-toggle="tooltip" href="--><?php //echo Url::toRoute('/tc/default/setvercookies'); //echo Yii::$app()->baseUrl.'/cmmslib/default/setvercookies' ?><!--" class="alert-link text-danger glyphicon glyphicon-off"></a>-->
<div id="demo" class="collapse">
    <h4>version <?php echo Yii::$app->controller->module->params['ModuleVers']; ?></h4>
    <ul>
        <li>แก้ไขชื่อระบบ</li>
    </ul>
</div>

<?php Alert::end(); ?>
<!--<div class="alert alert-info alert-dismissible" role="alert">-->
<!--    <div style="float:left;font-size:50px;margin-right:20px">-->
<!--        --><?php //echo Html::icon('info-sign'); ?>
<!--    </div>-->
<!--    <div>-->
<!--        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span-->
<!--                aria-hidden="true">&times;</span></button>-->
<!--        <h4><u>application-->
<!--                version --><?php //echo Yii::$app->controller->module->params['ModuleVers'] . ' ' . Html::icon('chevron-left'); ?>
<!--                1.0.0</u>-->
<!--            <a data-original-title="ปิดการแจ้งเตือน 30 วัน" data-toggle="tooltip"-->
<!--               href="--><?php //echo Url::toRoute('/itinfo/default/setvercookies'); ?><!--"-->
<!--               class="alert-link text-danger glyphicon glyphicon-off">-->
<!--            </a>-->
<!--        </h4>-->
<!--        <fieldset>-->
<!--            <legend>current version --><?php //echo Yii::$app->controller->module->params['ModuleVers'] ?><!--</legend>-->
<!--            <ul>-->
<!--                <li>แก้ไขชื่อระบบ</li>-->
<!--            </ul>-->
<!--        </fieldset>-->
<!--    </div>-->
<!--</div>-->
<script>
    function blinker() { $('.alert-link').fadeOut(500).fadeIn(500); }
    setInterval(blinker, 1000);
</script>