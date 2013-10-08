<?php

/**
 * This is the model class for table "itinerary_locations".
 *
 * The followings are the available columns in table 'itinerary_locations':
 * @property integer $id
 * @property integer $itinerary_id
 * @property string $date_from
<<<<<<< HEAD
=======
 * @property string $name
>>>>>>> def2c902e2605700237265c6ff0100057658fafc
 * @property string $date_to
 * @property integer $persons
 * @property integer $status
 * @property string $created_on
 *
 * The followings are the available model relations:
 * @property Itinerary $itinerary
 */
class ItineraryLocations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'itinerary_locations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
<<<<<<< HEAD
			array('itinerary_id, date_from, date_to, persons', 'required'),
			array('itinerary_id, persons, status', 'numerical', 'integerOnly'=>true),
			array('date_from, date_to, created_on', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, itinerary_id, date_from, date_to, persons, status, created_on', 'safe', 'on'=>'search'),
=======
			array('itinerary_id, date_from, name, date_to, persons', 'required'),
			array('itinerary_id, persons, status', 'numerical', 'integerOnly'=>true),
			array('date_from, date_to, created_on', 'length', 'max'=>20),
			array('name', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, itinerary_id, date_from, name, date_to, persons, status, created_on', 'safe', 'on'=>'search'),
>>>>>>> def2c902e2605700237265c6ff0100057658fafc
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
			'itinerary' => array(self::BELONGS_TO, 'Itinerary', 'itinerary_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'itinerary_id' => 'Itinerary',
			'date_from' => 'Date From',
<<<<<<< HEAD
=======
			'name' => 'Name',
>>>>>>> def2c902e2605700237265c6ff0100057658fafc
			'date_to' => 'Date To',
			'persons' => 'Persons',
			'status' => 'Status',
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
		$criteria->compare('itinerary_id',$this->itinerary_id);
		$criteria->compare('date_from',$this->date_from,true);
<<<<<<< HEAD
=======
		$criteria->compare('name',$this->name,true);
>>>>>>> def2c902e2605700237265c6ff0100057658fafc
		$criteria->compare('date_to',$this->date_to,true);
		$criteria->compare('persons',$this->persons);
		$criteria->compare('status',$this->status);
		$criteria->compare('created_on',$this->created_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ItineraryLocations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
