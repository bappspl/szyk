<?php
use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CmsCreateSlider extends AbstractMigration
{

    public function up()
    {
        $this->table('cms_slider', array())
             ->addColumn('name', 'string')
             ->addColumn('slug', 'string')
             ->addColumn('status_id', 'integer')
             ->save();

        $this->table('cms_slider_item', array())
            ->addColumn('slider_id', 'integer')
            ->addColumn('name', 'string')
            ->addColumn('title', 'string', array('null' => true))
            ->addColumn('description', 'string', array('null' => true))
            ->addColumn('filename', 'string', array('null' => true))
            ->addColumn('url', 'string', array('null' => true))
            ->addColumn('status_id', 'integer')
            ->addColumn('position', 'integer')
            ->addForeignKey('slider_id', 'cms_slider', 'id')
            ->save();

        $this->insertYamlValues('cms_slider');
    }

    public function insertYamlValues($tableName)
    {
        $filename = './data/fixtures/'.$tableName.'.yml';
        $array = \Symfony\Component\Yaml\Yaml::parse(file_get_contents($filename));

        foreach ($array as $sArray){
            $value = '';

            foreach ($sArray as $kCol => $vCol) {
                $vCol === null ? $value = $value . $kCol .' = NULL , ' : $value = $value . $kCol .' = "' . $vCol . '", ';
            }

            $realValue = substr($value, 0, -2);

            $this->execute("SET NAMES UTF8");
            $this->adapter->execute('insert into '.$tableName.' set '.$realValue);
        }
    }

    public function down()
    {
        $this->dropTable('cms_slider');
        $this->dropTable('cms_slider_item');
    }
}