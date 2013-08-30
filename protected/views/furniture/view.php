<?php
/* @var $this FurnitureController */
/* @var $model Furniture */

$this->breadcrumbs=array(
	'Furnitures'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Furniture', 'url'=>array('index', 'sid'=>$model->shop->id)),
	array('label'=>'Create Furniture', 'url'=>array('create', 'sid'=>$model->shop->id)),
	array('label'=>'Update Furniture', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Furniture', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Furniture', 'url'=>array('admin', 'sid'=>$model->shop->id)),
);
?>

<h1>View Furniture #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'shop_id',
		'category_id',
		'type_id',
		'style',
		'color',
		'material',
		'size',
		'country',
		'price',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
	),
)); ?>
