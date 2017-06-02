<?php

use Phinx\Migration\AbstractMigration;

class SetCreateTimeDefault extends AbstractMigration
{
    private $tableName = 'users';
    private $columnName = 'created';
    private $columnType = 'datetime';

    public function up()
    {
        $table = $this->table($this->tableName);

        $option = [
            'default' => 'CURRENT_TIMESTAMP',
        ];

        $table->changeColumn($this->columnName, $this->columnType, $option);
    }

    public function down()
    {
        $table = $this->table($this->tableName);
        
        $option = [
            'default' => null,
        ];
        
        $table->changeColumn($this->columnName, $this->columnType, $option);
    }
}
