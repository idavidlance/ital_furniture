<?php
/**
     * RecentAdvertssWidget is a Yii widget used to display a list of recent comments 
     */
class RecentAdvertsWidget extends CWidget
{
    private $_adverts;  
    public $displayLimit = 5;
    public $shopId = null;
  
    public function init()
    {
       	if(null !== $this->shopId)
       		$this->_adverts = Furniture::model()->with(array('shop'=>array('condition'=>'shop_id='.$this->shopId)))->recent($this->displayLimit)->findAll();
    	else
       		$this->_adverts = Furniture::model()->recent($this->displayLimit)->findAll();
    }

    public function getData()
    {
    	return $this->_adverts;
    }
        
    public function run()
    {
    	// this method is called by CController::endWidget()    
        $this->render('recentAdvertsWidget');
    }
}