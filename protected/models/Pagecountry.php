<?php

/**
* This is the model class for table "{{pagecountry}}".
*
* The followings are the available columns in table '{{pagecountry}}':
    * @property integer $id
    * @property integer $title
    * @property integer $id_country
    * @property string $wswg_body
    * @property integer $status
    * @property integer $sort
    * @property string $create_time
    * @property string $update_time
*/
class Pagecountry extends EActiveRecord
{
    public function tableName()
    {
        return '{{pagecountry}}';
    }


    public function rules()
    {
        return array(
            array('id_country, status, sort', 'numerical', 'integerOnly'=>true),
            array('wswg_body, create_time, update_time, title', 'safe'),
            // The following rule is used by search().
            array('id, title, id_country, wswg_body, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
         return array(
            'country' => array(self::BELONGS_TO, 'Country', 'id_country'),
        );
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => 'Заголовок',
            'id_country' => 'ID_COUNTRY',
            'wswg_body' => 'Текст',
            'status' => 'Статус',
            'sort' => 'Вес для сортировки',
            'create_time' => 'Дата создания',
            'update_time' => 'Дата последнего редактирования',
        );
    }


    public function behaviors()
    {
        return CMap::mergeArray(parent::behaviors(), array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'create_time',
                'updateAttribute' => 'update_time',
                'setUpdateOnCreate' => true,
			),
        ));
    }

    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title);
		$criteria->compare('id_country',$this->id_country);
		$criteria->compare('wswg_body',$this->wswg_body,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
        $criteria->order = 'sort';
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }


}
