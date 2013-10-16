<?php

/**
 * This is the model class for table "itinerary".
 *
 * The followings are the available columns in table 'itinerary':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $cover_image
 * @property string $date_from
 * @property string $date_to
 * @property integer $uid
 * @property integer $is_suggested
 * @property string $created_on
 * @property string $updated_on
 * @property string $host_ip
 *
 * The followings are the available model relations:
 * @property Images $coverImage
 * @property Users $u
 * @property ItineraryLocations[] $itineraryLocations
 */
class Itinerary extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'itinerary';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, date_from, date_to, uid, created_on, updated_on, host_ip', 'required'),
			array('cover_image, uid, is_suggested', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('date_from, date_to, created_on, updated_on, host_ip', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, cover_image, date_from, date_to, uid, is_suggested, created_on, updated_on, host_ip', 'safe', 'on'=>'search'),
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
			'coverImage' => array(self::BELONGS_TO, 'Images', 'cover_image'),
			'u' => array(self::BELONGS_TO, 'Users', 'uid'),
			'itineraryLocations' => array(self::HAS_MANY, 'ItineraryLocations', 'itinerary_id'),
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
			'cover_image' => 'Cover Image',
			'date_from' => 'Date From',
			'date_to' => 'Date To',
			'uid' => 'Uid',
                        'is_suggested' => 'Is Suggested',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('cover_image',$this->cover_image);
		$criteria->compare('date_from',$this->date_from,true);
		$criteria->compare('date_to',$this->date_to,true);
		$criteria->compare('uid',$this->uid);
                $criteria->compare('is_suggested',$this->is_suggested);
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
	 * @return Itinerary the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
