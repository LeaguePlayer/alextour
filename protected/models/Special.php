<?php

/**
* This is the model class for table "{{special}}".
*
* The followings are the available columns in table '{{special}}':
    * @property integer $id
    * @property string $img_preview
    * @property string $title
    * @property string $short_desc
    * @property string $wswg_content
    * @property integer $price
    * @property integer $duration
    * @property integer $id_list
    * @property integer $status
    * @property integer $sort
    * @property string $create_time
    * @property string $update_time
*/
class Special extends EActiveRecord
{
    public function tableName()
    {
        return '{{special}}';
    }


    public function rules()
    {
        return array(
			array('short_desc, wswg_content, title', 'required'),
            array('price, duration, id_list, status, sort', 'numerical', 'integerOnly'=>true),
            array('img_preview, title, short_desc', 'length', 'max'=>255),
            array('wswg_content, create_time, update_time', 'safe'),
            // The following rule is used by search().
            array('id, img_preview, title, short_desc, wswg_content, price, duration, id_list, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
        return array(
			'speciallist' => array(self::BELONGS_TO, 'Speciallist', 'id_list'),
        );
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'img_preview' => 'Изображение',
            'title' => 'Заголовок',
            'short_desc' => 'Краткая информация (макс. 255 символов)',
            'wswg_content' => 'Текст',
            'price' => 'Цена',
            'duration' => 'Продолжительность',
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
			'imgBehaviorPreview' => array(
				'class' => 'application.behaviors.UploadableImageBehavior',
				'attributeName' => 'img_preview',
				'versions' => array(
					'icon' => array(
						'centeredpreview' => array(90, 90),
					),
					'small' => array(
						'centeredpreview' => array(166, 124),
					)
				),
			),
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
		$criteria->compare('img_preview',$this->img_preview,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('short_desc',$this->short_desc,true);
		$criteria->compare('wswg_content',$this->wswg_content,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('duration',$this->duration);
		$criteria->compare('id_list',$this->id_list);
		$criteria->compare('status',$this->status);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
       // $criteria->order = 'sort';
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'id DESC',
			),
        ));
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }


}
