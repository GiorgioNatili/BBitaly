<?php

/**
 * This is the model class for table "room".
 *
 * The followings are the available columns in table 'room':
 * @property integer $id
 * @property integer $property_id
 * @property string $title
 * @property integer $people_min
 * @property integer $people_max
 * @property double $price
 * @property integer $policy
 * @property integer $is_refundable
 * @property string $created_on
 * @property string $updated_on
 * @property string $host_ip
 *
 * The followings are the available model relations:
 * @property Descriptions $descriptions
 * @property Images[] $images
 * @property Policies $policy0
 * @property Property $property
 * @property RoomAvailability[] $roomAvailabilities
 * @property RoomBookings[] $roomBookings
 * @property ServicesEntity[] $servicesEntities
 */
class Room extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'room';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('property_id, title, people_min, people_max, price, policy, created_on, updated_on, host_ip', 'required'),
			array('property_id, people_min, people_max, policy, is_refundable', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('title', 'length', 'max'=>50),
			array('created_on, updated_on, host_ip', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, property_id, title, people_min, people_max, price, policy, is_refundable, created_on, updated_on, host_ip', 'safe', 'on'=>'search'),
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
			'descriptions' => array(self::HAS_ONE, 'Descriptions', 'room_id'),
			'images' => array(self::HAS_MANY, 'Images', 'room_id'),
			'policy0' => array(self::BELONGS_TO, 'Policies', 'policy'),
			'property' => array(self::BELONGS_TO, 'Property', 'property_id'),
			'roomAvailabilities' => array(self::HAS_MANY, 'RoomAvailability', 'room_id'),
			'roomBookings' => array(self::HAS_MANY, 'RoomBookings', 'room_id'),
			'servicesEntities' => array(self::HAS_MANY, 'ServicesEntity', 'room_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'property_id' => 'Property',
			'title' => 'Title',
			'people_min' => 'People Min',
			'people_max' => 'People Max',
			'price' => 'Price',
			'policy' => 'Policy',
			'is_refundable' => 'Is Refundable',
			'created_on' => 'Created On',
			'updated_on' => 'Updated On',
			'host_ip' => 'Host Ip',
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
		$criteria->compare('property_id',$this->property_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('people_min',$this->people_min);
		$criteria->compare('people_max',$this->people_max);
		$criteria->compare('price',$this->price);
		$criteria->compare('policy',$this->policy);
		$criteria->compare('is_refundable',$this->is_refundable);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('updated_on',$this->updated_on,true);
		$criteria->compare('host_ip',$this->host_ip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Room the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        protected function beforeSave() {
            if ( $this->isNewRecord )
                $this->created_on = time();
            
            $this->updated_on = time();
            $this->host_ip = $_SERVER['REMOTE_ADDR'];
            
            return parent::beforeSave();
        }
}
