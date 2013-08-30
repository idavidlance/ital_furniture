<?php

/**
 * This is the model class for table "tbl_furniture".
 *
 * The followings are the available columns in table 'tbl_furniture':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $shop_id
 * @property integer $category_id
 * @property integer $type_id
 * @property string $style
 * @property string $color
 * @property string $material
 * @property string $size
 * @property string $country
 * @property integer $price
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property Shop $shop
 * @property Category $category
 * @property Type $type
 */
class Furniture extends WraperActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Furniture the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_furniture';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('shop_id, category_id, type_id, price', 'numerical', 'integerOnly'=>true),
			array('name, style, color, material, size, country', 'length', 'max'=>255),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, shop_id, category_id, type_id, style, color, material, size, country, price, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'shop' => array(self::BELONGS_TO, 'Shop', 'shop_id'),
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'type' => array(self::BELONGS_TO, 'Type', 'type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'shop_id' => 'Shop',
			'category_id' => 'Category',
			'type_id' => 'Type',
			'style' => 'Style',
			'color' => 'Color',
			'material' => 'Material',
			'size' => 'Size',
			'country' => 'Country',
			'price' => 'Price',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		//$criteria->compare('shop_id',$this->shop_id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('style',$this->style,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('material',$this->material,true);
		$criteria->compare('size',$this->size,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);
		$criteria->condition='shop_id=:shopID';
    	$criteria->params=array(':shopID'=>$this->shop_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}