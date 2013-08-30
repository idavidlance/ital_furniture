<?php
/* @var $this ShopController */
/* @var $model Shop */

$this->breadcrumbs=array(
	'Shops'=>array('index'),
	$model->name,
);

$this->menu=array(
	/*array('label'=>'List Shop', 'url'=>array('index')),
	array('label'=>'Create Shop', 'url'=>array('create')),
	array('label'=>'Update Shop', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Shop', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Shop', 'url'=>array('admin')),
	array('label'=>'Add Furniture', 'url'=>array('furniture/create', 'sid'=>$model->id)),
	array('label'=>'Add User To Project', 'url'=>array('shop/adduser', 'id'=>$model->id)),*/

	array('label'=>'List Shop', 'url'=>array('index')),
	array('label'=>'Create Shop', 'url'=>array('create')),
	array('label'=>'Update Shop', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Shop', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Shop', 'url'=>array('admin')),
	array('label'=>'Create Furniture', 'url'=>array('furniture/create', 'sid'=>$model->id)),
);

if(Yii::app()->user->checkAccess('createUser',array('shop'=>$model)))
{
	$this->menu[] = array('label'=>'Add User To Shop', 'url'=>array('adduser', 'id'=>$model->id));
}
?>

<h1>View Shop #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
	),
)); ?>

<br />
<h1>Furniture</h1>
<?php $this->widget('zii.widgets.CListView', array(
  'dataProvider'=>$furnitDataProvider,
  'itemView'=>'/furniture/_view',
)); ?>