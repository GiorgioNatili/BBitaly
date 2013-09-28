<?php

/**
 * This is the model class for table "billing".
 *
 * The followings are the available columns in table 'billing':
 * @property integer $id
 * @property integer $user_id
 * @property integer $property_id
 * @property integer $salutation
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $city
 * @property string $address
 * @property string $zip_code
 * @property string $created_on
 *
 * The followings are the available model relations:
 * @property Property $property
 * @property Users $user
 */
class Billing extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'billing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, property_id, salutation, first_name, last_name, email, city, address, zip_code', 'required'),
			array('user_id, property_id, salutation', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name', 'length', 'max'=>30),
			array('email', 'length', 'max'=>50),
			array('city', 'length', 'max'=>40),
			array('address', 'length', 'max'=>100),
			array('zip_code, created_on', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, property_id, salutation, first_name, last_name, email, city, address, zip_code, created_on', 'safe', 'on'=>'search'),
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
			'property' => array(self::BELONGS_TO, 'Property', 'property_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'property_id' => 'Property',
			'salutation' => 'Salutation',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'city' => 'City',
			'address' => 'Address',
			'zip_code' => 'Zip Code',
			'created_on' => 'Created On',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('property_id',$this->property_id);
		$criteria->compare('salutation',$this->salutation);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('zip_code',$this->zip_code,true);
		$criteria->compare('created_on',$this->created_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Billing the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
