<?php
/* @var $this ShopController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Shops',
);

$this->menu=array(
	array('label'=>'Create Shop', 'url'=>array('create')),
	array('label'=>'Manage Shop', 'url'=>array('admin')),
);
?>

<?php if($sysMessage != null):?>
    <div class="sys-message">
        <?php echo $sysMessage; ?>
    </div>
<?php
  Yii::app()->clientScript->registerScript(
     'fadeAndHideEffect',
     '$(".sys-message").animate({opacity: 1.0}, 5000).
fadeOut("slow");'
  );
endif; ?>

<h1>Shops</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
