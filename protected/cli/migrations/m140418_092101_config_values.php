<?php
/**
 * Миграция m140418_092101_config_values
 *
 * @property string $prefix
 */
 
class m140418_092101_config_values extends CDbMigration
{
    // таблицы к удалению, можно использовать '{{table}}'
	
 
    public function safeUp()
    {
        $this->insert("{{config}}", array("param"=>"app.code_city", "value"=>"test", "default"=>"", "label"=>"Код города", "type"=>"string", "variants"=>"") );
		
		$this->insert("{{config}}", array("param"=>"app.phone", "value"=>"test", "default"=>"", "label"=>"Номер телефона", "type"=>"string", "variants"=>"") );
		
		$this->insert("{{config}}", array("param"=>"app.email", "value"=>"test", "default"=>"", "label"=>"E-Mail администратора", "type"=>"string", "variants"=>"") );
		
		$this->insert("{{config}}", array("param"=>"app.year_begin", "value"=>"test", "default"=>"", "label"=>"Год основания компании", "type"=>"string", "variants"=>"") );
		
		$this->insert("{{config}}", array("param"=>"app.company_name", "value"=>"test", "default"=>"", "label"=>"Название компании", "type"=>"string", "variants"=>"") );
		
		$this->insert("{{config}}", array("param"=>"app.insta", "value"=>"test", "default"=>"", "label"=>"Ссылка на Instagram", "type"=>"string", "variants"=>"") );
		
		$this->insert("{{config}}", array("param"=>"app.vk", "value"=>"test", "default"=>"", "label"=>"Ссылка на vkontakte", "type"=>"string", "variants"=>"") );
		
		$this->insert("{{config}}", array("param"=>"app.fb", "value"=>"test", "default"=>"", "label"=>"Ссылка на Facebook", "type"=>"string", "variants"=>"") );
		
		$this->insert("{{config}}", array("param"=>"app.tw", "value"=>"test", "default"=>"", "label"=>"Ссылка на Twitter", "type"=>"string", "variants"=>"") );
		
		$this->insert("{{config}}", array("param"=>"app.skype", "value"=>"test", "default"=>"", "label"=>"Сслылка на Skype", "type"=>"string", "variants"=>"") );
		
		$this->insert("{{config}}", array("param"=>"app.slogan", "value"=>"test", "default"=>"", "label"=>"Слоган", "type"=>"string", "variants"=>"") );
    }
 
    public function safeDown()
    {
        
    }
 
    /**
     * Удаляет таблицы, указанные в $this->dropped из базы.
     * Наименование таблиц могут сожержать двойные фигурные скобки для указания
     * необходимости добавления префикса, например, если указано имя {{table}}
     * в действительности будет удалена таблица 'prefix_table'.
     * Префикс таблиц задается в файле конфигурации (для консоли).
     */
   
 
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