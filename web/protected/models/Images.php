<?php

/**
 * This is the model class for table "images".
 *
 * The followings are the available columns in table 'images':
 * @property integer $id
 * @property integer $type
 * @property integer $property_id
 * @property integer $room_id
 * @property integer $is_cover
 * @property string $img_name
 * @property string $img_mime
 * @property string $img_size
 * @property integer $status
 * @property string $uploaded_on
 *
 * The followings are the available model relations:
 * @property Entity $type0
 * @property Property $property
 * @property Room $room
 * @property Itinerary[] $itineraries
 * @property Property[] $properties
 */
class Images extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'images';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, img_name, img_mime, img_size, uploaded_on', 'required'),
			array('type, property_id, room_id, is_cover, status', 'numerical', 'integerOnly'=>true),
			array('img_name', 'length', 'max'=>50),
			array('img_mime, img_size', 'length', 'max'=>30),
			array('uploaded_on', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type, property_id, room_id, is_cover, img_name, img_mime, img_size, status, uploaded_on', 'safe', 'on'=>'search'),
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
			'type0' => array(self::BELONGS_TO, 'Entity', 'type'),
			'property' => array(self::BELONGS_TO, 'Property', 'property_id'),
			'room' => array(self::BELONGS_TO, 'Room', 'room_id'),
			'itineraries' => array(self::HAS_MANY, 'Itinerary', 'cover_image'),
			'properties' => array(self::HAS_MANY, 'Property', 'cover_image'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Type',
			'property_id' => 'Property',
			'room_id' => 'Room',
			'is_cover' => 'Is Cover',
			'img_name' => 'Img Name',
			'img_mime' => 'Img Mime',
			'img_size' => 'Img Size',
			'status' => 'Status',
			'uploaded_on' => 'Uploaded On',
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
		$criteria->compare('type',$this->type);
		$criteria->compare('property_id',$this->property_id);
		$criteria->compare('room_id',$this->room_id);
		$criteria->compare('is_cover',$this->is_cover);
		$criteria->compare('img_name',$this->img_name,true);
		$criteria->compare('img_mime',$this->img_mime,true);
		$criteria->compare('img_size',$this->img_size,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('uploaded_on',$this->uploaded_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Images the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
