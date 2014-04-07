<?php
/**
 * Миграция m140407_094921_add_columns_page
 *
 * @property string $prefix
 */
 
class m140407_094921_add_columns_page extends CDbMigration
{
    // таблицы к удалению, можно использовать '{{table}}'

 
    public function safeUp()
    {
        $this->addColumn('{{pages}}', 'recommend', 'smallint');
		$this->addColumn('{{pages}}', 'call_with_me', 'smallint');
    }
 
    public function safeDown()
    {
        $this->dropColumn('{{pages}}', 'recommend');
		$this->dropColumn('{{pages}}', 'call_with_me');
    }
 
    /**
     * Удаляет таблицы, указанные в $this->dropped из базы.
     * Наименование таблиц могут сожержать двойные фигурные скобки для указания
     * необходимости добавления префикса, например, если указано имя {{table}}
     * в действительности будет удалена таблица 'prefix_table'.
     * Префикс таблиц задается в файле конфигурации (для консоли).
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