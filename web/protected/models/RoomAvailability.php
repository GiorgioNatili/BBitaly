<?php

/**
 * This is the model class for table "room_availability".
 *
 * The followings are the available columns in table 'room_availability':
 * @property integer $id
 * @property integer $room_id
 * @property integer $booking_id
 * @property integer $is_booked
 * @property integer $day
 * @property integer $month
 * @property integer $year
 * @property integer $on_offer
 * @property double $price
 * @property string $created_on
 *
 * The followings are the available model relations:
 * @property Room $room
 * @property RoomBookings $booking
 */
class RoomAvailability extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'room_availability';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('room_id, day, month, year, created_on', 'required'),
			array('room_id, booking_id, is_booked, day, month, year, on_offer', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('created_on', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, room_id, booking_id, is_booked, day, month, year, on_offer, price, created_on', 'safe', 'on'=>'search'),
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
			'room' => array(self::BELONGS_TO, 'Room', 'room_id'),
			'booking' => array(self::BELONGS_TO, 'RoomBookings', 'booking_id'),
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
			'booking_id' => 'Booking',
			'is_booked' => 'Is Booked',
			'day' => 'Day',
			'month' => 'Month',
			'year' => 'Year',
			'on_offer' => 'On Offer',
			'price' => 'Price',
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
		$criteria->compare('room_id',$this->room_id);
		$criteria->compare('booking_id',$this->booking_id);
		$criteria->compare('is_booked',$this->is_booked);
		$criteria->compare('day',$this->day);
		$criteria->compare('month',$this->month);
		$criteria->compare('year',$this->year);
		$criteria->compare('on_offer',$this->on_offer);
		$criteria->compare('price',$this->price);
		$criteria->compare('created_on',$this->created_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RoomAvailability the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
