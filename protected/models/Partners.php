<?php

/**
* This is the model class for table "{{partners}}".
*
* The followings are the available columns in table '{{partners}}':
    * @property integer $id
    * @property string $title
    * @property string $img_preview
    * @property string $link
    * @property integer $id_list
    * @property integer $status
    * @property integer $sort
    * @property string $create_time
    * @property string $update_time
*/
class Partners extends EActiveRecord
{
    public function tableName()
    {
        return '{{partners}}';
    }


    public function rules()
    {
        return array(
			array('title', 'required'),
            array('id_list, status, sort', 'numerical', 'integerOnly'=>true),
            array('title, img_preview, link', 'length', 'max'=>255),
            array('create_time, update_time', 'safe'),
            // The following rule is used by search().
            array('id, title, img_preview, link, id_list, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
        return array(
			'partnerslist' => array(self::BELONGS_TO, 'Partnerslist', 'id_list'),
        );
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => 'Название',
            'img_preview' => 'Логотип партнера',
            'link' => 'Ссылка на сайт партнера (без http://)',
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
						'resize' => array(0, 52),
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('img_preview',$this->img_preview,true);
		$criteria->compare('link',$this->link,true);
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
