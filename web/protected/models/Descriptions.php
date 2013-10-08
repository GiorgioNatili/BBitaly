<?php

/**
 * This is the model class for table "descriptions".
 *
 * The followings are the available columns in table 'descriptions':
 * @property integer $id
 * @property integer $type
 * @property integer $room_id
 * @property integer $property_id
 * @property string $lang_italian
 * @property string $lang_english
 * @property string $lang_german
 * @property string $lang_portugese
 * @property string $lang_neapolitan
 * @property string $lang_french
 * @property string $lang_spanish
 * @property string $created_on
 *
 * The followings are the available model relations:
 * @property Entity $type0
 * @property Property $property
 * @property Room $room
 */
class Descriptions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'descriptions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, lang_italian, created_on', 'required'),
			array('type, room_id, property_id', 'numerical', 'integerOnly'=>true),
			array('created_on', 'length', 'max'=>20),
			array('lang_english, lang_german, lang_portugese, lang_neapolitan, lang_french, lang_spanish', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type, room_id, property_id, lang_italian, lang_english, lang_german, lang_portugese, lang_neapolitan, lang_french, lang_spanish, created_on', 'safe', 'on'=>'search'),
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
			'room_id' => 'Room',
			'property_id' => 'Property',
			'lang_italian' => 'Lang Italian',
			'lang_english' => 'Lang English',
			'lang_german' => 'Lang German',
			'lang_portugese' => 'Lang Portugese',
			'lang_neapolitan' => 'Lang Neapolitan',
			'lang_french' => 'Lang French',
			'lang_spanish' => 'Lang Spanish',
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
		$criteria->compare('type',$this->type);
		$criteria->compare('room_id',$this->room_id);
		$criteria->compare('property_id',$this->property_id);
		$criteria->compare('lang_italian',$this->lang_italian,true);
		$criteria->compare('lang_english',$this->lang_english,true);
		$criteria->compare('lang_german',$this->lang_german,true);
		$criteria->compare('lang_portugese',$this->lang_portugese,true);
		$criteria->compare('lang_neapolitan',$this->lang_neapolitan,true);
		$criteria->compare('lang_french',$this->lang_french,true);
		$criteria->compare('lang_spanish',$this->lang_spanish,true);
		$criteria->compare('created_on',$this->created_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Descriptions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getDescription($criteria) {
            $desc = $this->findByAttributes($criteria);
            
            
            return $desc;
        }
        
        protected function beforeSave() {
            
            $this->created_on = time();
            return parent::beforeSave();
        }
}
