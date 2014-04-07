<?php
/**
 * Миграция m140403_052530_news
 *
 * @property string $prefix
 */
 
class m140403_052530_news extends CDbMigration
{
    // таблицы к удалению, можно использовать '{{table}}'
	private $dropped = array('{{news}}', '{{news_list}}');
 
    public function safeUp()
    {
        $this->_checkTables();
 
        $this->createTable('{{news}}', array(
            'id' => 'pk', // auto increment

			'title' => "string COMMENT 'Название новости'",
			'img_preview' => "string COMMENT 'Изображение'",
			'id_country' => "integer COMMENT 'Привязать к стране'",
			'wswg_content' => "text COMMENT 'Текст новости'",
			
			'id_list' => "integer COMMENT 'LIST'",
			'seo_id' => "integer COMMENT 'SEO'",
			
			'status' => "tinyint COMMENT 'Статус'",
			//'sort' => "integer COMMENT 'Вес для сортировки'",
            'create_time' => "datetime COMMENT 'Дата создания'",
            'update_time' => "datetime COMMENT 'Дата последнего редактирования'",
        ),
        'ENGINE=MyISAM DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci');
		
		
		$this->createTable('{{news_list}}', array(
            'id' => 'pk', // auto increment

			'node_id' => "integer COMMENT 'ID_NODE'",
			'page_size' => "integer COMMENT 'Кол-во новостей на странице'",
			
        ),
        'ENGINE=MyISAM DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci');
    }
 
    public function safeDown()
    {
        $this->_checkTables();
    }
 
    /**
     * Удаляет таблицы, указанные в $this->dropped из базы.
     * Наименование таблиц могут сожержать двойные фигурные скобки для указания
     * необходимости добавления префикса, например, если указано имя {{table}}
     * в действительности будет удалена таблица 'prefix_table'.
     * Префикс таблиц задается в файле конфигурации (для консоли).
     */
    private function _checkTables ()
    {
        if (empty($this->dropped)) return;
 
        $table_names = $this->getDbConnection()->getSchema()->getTableNames();
        foreach ($this->dropped as $table) {
            if (in_array($this->tableName($table), $table_names)) {
                $this->dropTable($table);
            }
        }
    }
 
    /**
     * Добавляет префикс таблицы при необходимости
     * @param $name - имя таблицы, заключенное в скобки, например {{имя}}
     * @return string
     */
    protected function tableName($name)
    {
        if($this->getDbConnection()->tablePrefix!==null && strpos($name,'{{')!==false)
            $realName=preg_replace('/{{(.*?)}}/',$this->getDbConnection()->tablePrefix.'$1',$name);
        else
            $realName=$name;
        return $realName;
    }
 
    /**
     * Получение установленного префикса таблиц базы данных
     * @return mixed
     */
    protected function getPrefix(){
        return $this->getDbConnection()->tablePrefix;
    }
}