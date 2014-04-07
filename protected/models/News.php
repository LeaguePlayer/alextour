<?php

/**
* This is the model class for table "{{news}}".
*
* The followings are the available columns in table '{{news}}':
    * @property integer $id
    * @property string $title
    * @property string $img_preview
    * @property integer $id_country
    * @property string $wswg_content
    * @property integer $id_list
    * @property integer $seo_id
    * @property integer $status
    * @property string $create_time
    * @property string $update_time
*/
class News extends EActiveRecord
{
    public function tableName()
    {
        return '{{news}}';
    }


    public function rules()
    {
        return array(
            array('id_country, id_list, seo_id, status', 'numerical', 'integerOnly'=>true),
            array('title, img_preview', 'length', 'max'=>255),
            array('wswg_content, create_time, update_time, short_desc', 'safe'),
            // The following rule is used by search().
            array('id, title, img_preview, id_country, wswg_content, id_list, seo_id, status, create_time, update_time', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
        return array(
			'country' => array(self::BELONGS_TO, 'Country', 'id_country'),
			  'list'=>array(self::BELONGS_TO, 'Newslist', 'id_list'),
        );
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => 'Название новости',
            'img_preview' => 'Изображение',
            'id_country' => 'Привязать к стране',
            'wswg_content' => 'Текст новости',
            'id_list' => 'LIST',
            'seo_id' => 'SEO',
            'status' => 'Статус',
            'create_time' => 'Дата создания',
            'update_time' => 'Дата последнего редактирования',
			'short_desc'=>'Краткое описание',
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
						'centeredpreview' => array(400, 95),
					)
				),
			),
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'create_time',
                'updateAttribute' => 'update_time',
                'setUpdateOnCreate' => true,
			),
			'seo' => array(
                'class' => 'application.behaviors.SeoBehavior',
            )

        ));
    }

    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('img_preview',$this->img_preview,true);
		$criteria->compare('id_country',$this->id_country);
		$criteria->compare('wswg_content',$this->wswg_content,true);
		$criteria->compare('id_list',$this->id_list);
		$criteria->compare('seo_id',$this->seo_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		
		//$criteria->defaultOrder = "id DESC";
		
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
