<?php

/**
 * This is the model class for table "room_bookings".
 *
 * The followings are the available columns in table 'room_bookings':
 * @property integer $id
 * @property integer $room_id
 * @property integer $user_id
 * @property string $booked_on
 * @property string $host_ip
 *
 * The followings are the available model relations:
 * @property RoomAvailability[] $roomAvailabilities
 * @property Users $user
 * @property Room $room
 */
class RoomBookings extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'room_bookings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('room_id, user_id, booked_on', 'required'),
			array('room_id, user_id', 'numerical', 'integerOnly'=>true),
			array('booked_on, host_ip', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, room_id, user_id, booked_on, host_ip', 'safe', 'on'=>'search'),
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
			'roomAvailabilities' => array(self::HAS_MANY, 'RoomAvailability', 'booking_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'room' => array(self::BELONGS_TO, 'Room', 'room_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'room_id' => 'Room',
			'user_id' => 'User',
			'booked_on' => 'Booked On',
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
		$criteria->compare('room_id',$this->room_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('booked_on',$this->booked_on,true);
		$criteria->compare('host_ip',$this->host_ip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RoomBookings the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
