<?php

/**
* This is the model class for table "{{reviews}}".
*
* The followings are the available columns in table '{{reviews}}':
    * @property integer $id
    * @property string $name
    * @property string $review
    * @property integer $rating
    * @property integer $id_list
    * @property integer $status
    * @property integer $sort
    * @property string $create_time
    * @property string $update_time
*/
class Reviews extends EActiveRecord
{
    public function tableName()
    {
        return '{{reviews}}';
    }


    public function rules()
    {
        return array(
			array('rating, review', 'required'),
            array('rating, id_list, status, sort', 'numerical', 'integerOnly'=>true),
            array('name', 'length', 'max'=>255),
            array('review, create_time, update_time', 'safe'),
            // The following rule is used by search().
            array('id, name, review, rating, id_list, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
        return array(
			'reviewslist' => array(self::BELONGS_TO, 'Reviewslist', 'id_list'),
        );
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Имя',
            'review' => 'Отзыв',
            'rating' => 'Оценка',
            'id_list' => 'ID_LIST',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('review',$this->review,true);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('id_list',$this->id_list);
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
