<?php

/**
* This is the model class for table "{{countrylist}}".
*
* The followings are the available columns in table '{{countrylist}}':
    * @property integer $id
    * @property integer $node_id
    * @property integer $seo_id
    * @property string $wswg_content
    * @property integer $status
    * @property integer $sort
    * @property string $create_time
    * @property string $update_time
*/
class Countrylist extends EActiveRecord
{
    public function tableName()
    {
        return '{{countrylist}}';
    }


    public function rules()
    {
        return array(
            array('node_id, seo_id, status, sort', 'numerical', 'integerOnly'=>true),
            array('wswg_content, create_time, update_time', 'safe'),
            // The following rule is used by search().
            array('id, node_id, seo_id, wswg_content, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
         return array(
            'node' => array(self::BELONGS_TO, 'Structure', 'node_id'),
        );
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'node_id' => 'NODE_ID',
            'seo_id' => 'SEO_ID',
            'wswg_content' => 'Текст',
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
			'Seo' => array(
				'class' => 'application.behaviors.SeoBehavior',
			),
			 'structure' => array(
                'class' => 'application.behaviors.StructureBehavior',
            ),
        ));
    }

    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('node_id',$this->node_id);
		$criteria->compare('seo_id',$this->seo_id);
		$criteria->compare('wswg_content',$this->wswg_content,true);
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
	
	public function countrySearch($count = null)
    {
        $criteria = new CDbCriteria();
        $criteria->compare('id_list', $this->id);
        $criteria->compare('status', News::STATUS_PUBLISH);
        $criteria->order = 'create_time DESC';
       $pageSize = 9999;
        return new CActiveDataProvider('Country', array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>$pageSize
            )
        ));
    }

}
