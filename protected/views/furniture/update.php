<?php
/* @var $this FurnitureController */
/* @var $model Furniture */

$this->breadcrumbs=array(
	'Furnitures'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Furniture', 'url'=>array('index')),
	array('label'=>'Create Furniture', 'url'=>array('create')),
	array('label'=>'View Furniture', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Furniture', 'url'=>array('admin')),
);
?>

<h1>Update Furniture <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>