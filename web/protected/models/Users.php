<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $source
 * @property string $extra
 * @property integer $status
 * @property string $created_on
 * @property string $updated_on
 *
 * The followings are the available model relations:
 * @property AuthItem[] $authItems
 * @property Billing[] $billings
 * @property Favorites[] $favorites
 * @property Itinerary[] $itineraries
 * @property Property[] $properties
 * @property RoomBookings[] $roomBookings
 */
class Users extends CActiveRecord
{
        const SOURCE_FACEBOOK = 'facebook';
    
        const SOURCE_BBITALY = 'bbitaly';

        const ROLE_ADMIN = 'admin';

        const ROLE_TRAVELER = 'traveler';

        const ROLE_OWNER = 'owner';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, email, source, created_on, updated_on', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, extra', 'length', 'max'=>30),
			array('email', 'length', 'max'=>50),
			array('password', 'length', 'max'=>64),
			array('source', 'length', 'max'=>8),
			array('created_on, updated_on', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, first_name, last_name, email, password, source, extra, status, created_on, updated_on', 'safe', 'on'=>'search'),
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
			'authItems' => array(self::MANY_MANY, 'AuthItem', 'AuthAssignment(userid, itemname)'),
			'billings' => array(self::HAS_MANY, 'Billing', 'user_id'),
			'favorites' => array(self::HAS_MANY, 'Favorites', 'user_id'),
			'itineraries' => array(self::HAS_MANY, 'Itinerary', 'uid'),
			'properties' => array(self::HAS_MANY, 'Property', 'uid'),
			'roomBookings' => array(self::HAS_MANY, 'RoomBookings', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'password' => 'Password',
			'source' => 'Source',
			'extra' => 'Extra',
			'status' => 'Status',
			'created_on' => 'Created On',
			'updated_on' => 'Updated On',
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
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('extra',$this->extra,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('updated_on',$this->updated_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
