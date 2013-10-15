<?php

/**
 * This is the model class for table "property".
 *
 * The followings are the available columns in table 'property':
 * @property integer $id
 * @property string $title
 * @property integer $type
 * @property integer $people_min
 * @property integer $people_max
 * @property string $address
 * @property string $city
 * @property string $zip_code
 * @property integer $cover_image
 * @property double $base_price
 * @property integer $available_rooms
 * @property integer $uid
 * @property string $created_on
 *
 * The followings are the available model relations:
 * @property Billing $billing
 * @property Descriptions $descriptions
 * @property Favorites[] $favorites
 * @property Images[] $images
 * @property Images $coverImage
 * @property PropertyTypes $type0
 * @property Users $u
 * @property Room[] $rooms
 * @property ServicesEntity[] $servicesEntities
 */
class Property extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'property';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, type, people_min, people_max, base_price,available_rooms, uid', 'required'),
			array('type, people_min, people_max, cover_image, available_rooms, uid', 'numerical', 'integerOnly'=>true),
			array('base_price', 'numerical'),
			array('title', 'length', 'max'=>50),
			array('address', 'length', 'max'=>100),
			array('city', 'length', 'max'=>40),
			array('zip_code, created_on', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, type, people_min, people_max, address, city, zip_code, cover_image, base_price, uid, created_on', 'safe', 'on'=>'search'),
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
			'billing' => array(self::HAS_ONE, 'Billing', 'property_id'),
			'descriptions' => array(self::HAS_ONE, 'Descriptions', 'property_id'),
			'favorites' => array(self::HAS_MANY, 'Favorites', 'property_id'),
			'images' => array(self::HAS_MANY, 'Images', 'property_id'),
			'coverImage' => array(self::BELONGS_TO, 'Images', 'cover_image'),
			'type0' => array(self::BELONGS_TO, 'PropertyTypes', 'type'),
			'u' => array(self::BELONGS_TO, 'Users', 'uid'),
			'rooms' => array(self::HAS_MANY, 'Room', 'property_id'),
			'servicesEntities' => array(self::HAS_MANY, 'ServicesEntity', 'property_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'type' => 'Type',
			'people_min' => 'People Min',
			'people_max' => 'People Max',
			'address' => 'Address',
			'city' => 'City',
			'zip_code' => 'Zip Code',
			'cover_image' => 'Cover Image',
			'base_price' => 'Base Price',
                        'available_rooms' => 'Available Rooms',
			'uid' => 'Uid',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('people_min',$this->people_min);
		$criteria->compare('people_max',$this->people_max);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('zip_code',$this->zip_code,true);
		$criteria->compare('cover_image',$this->cover_image);
		$criteria->compare('base_price',$this->base_price);
                $criteria->compare('available_rooms',$this->available_rooms);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('created_on',$this->created_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Property the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getRoomsIds($id) {
            $rooms = Room::model()
                    ->findAllByAttributes(array(
                        'property_id' => $id
                    ));
            $roomIds = array();
            foreach ($rooms as $room) {
                $roomIds[] = $room->id;
            }
            return $roomIds;

        }
        
        public function getImages() {
            return Images::model()
                    ->findAllByAttributes(array(
                        'property_id'   => $this->id,
                        'status'    => 1,
                        'is_cover' => 0
                    ));
        }
        
        public function deactivateCover() {
            Images::model()
                    ->updateAll(array(
                        'status' => 0
                    ), 'property_id = '. $this->id.' AND is_cover = 1');
        }
        
        /**
         * 
         * @param int $user_id  UserId to check existence.
         * @param int $flag Either search in collection or db.
         * @param Favorites[] $data   If flag is 1, then data to be used
         */
        public function inUserFavorites($user_id, $flag = 1, $data = array()) {
            if ( $flag === 1) {
                foreach ($data as $row) {
                    if ( $row->user_id == $user_id )
                        return true;
                }
                return false;
            }
            
            return false;
        }

        protected function beforeSave() {
            if ( $this->isNewRecord )
                $this->created_on = time();
            return parent::beforeSave();
        }
        
}
