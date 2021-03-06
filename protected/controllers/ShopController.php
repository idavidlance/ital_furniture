<?php

class ShopController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
			array(
            	'COutputCache + view',  //cache the entire output from the actionView() method for 2 minutes
            	'duration'=>120,
            	'varyByParam'=>array('id'),
        	),
		);
	}

	public function actionAdduser($id)
	{
		$shop = $this->loadModel($id);
		if(!Yii::app()->user->checkAccess('createUser', array('shop'=>$shop)))
		{
			throw new CHttpException(403,'You are not authorized to perform this action.');
		}
		$form = new ShopUserForm; 
		// collect user input data
		/*if(isset($_POST['ShopUserForm']))
		{
	    	$form->attributes=$_POST['ShopUserForm'];
	    	$form->shop = $shop;
	    	// validate user input  
	    	if($form->validate())  
	    	{
		        if($form->assign())
		    	{
		    		Yii::app()->user->setFlash('success',$form->username . " has been added to the shop." ); 
		       		//reset the form for another user to be associated if desired
		      		$form->unsetAttributes();
		      		$form->clearErrors();
		      	}
	    	}
	  	}
		$form->shop = $shop;
		$this->render('adduser',array('model'=>$form)); */
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$furnitDataProvider=new CActiveDataProvider('Furniture', array(
			'criteria'=>array(
				'condition'=>'shop_id=:shopId',
				'params'=>array(':shopId'=>$this->loadModel($id)->id),),
			'pagination'=>array('pageSize'=>5,),
			));

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'furnitDataProvider' => $furnitDataProvider,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Shop;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Shop']))
		{
			$model->attributes=$_POST['Shop'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Shop']))
		{
			$model->attributes=$_POST['Shop'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Shop');

		//$sysMessage = SysMessage::model()->find(array('order'=>'t.update_time DESC',));
		$sysMessage = SysMessage::getLatest();
      	if($sysMessage !== null)
        	$message = $sysMessage->message;
      	else
        	$message = null;

        $this->render('index',array(
			'dataProvider'=>$dataProvider,
			'sysMessage'=>$message,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Shop('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Shop']))
			$model->attributes=$_GET['Shop'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Shop the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Shop::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Shop $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='shop-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
