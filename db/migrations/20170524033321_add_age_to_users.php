<?php

use Phinx\Migration\AbstractMigration;

class AddAgeToUsers extends AbstractMigration
{
    const COLUMN_NAME   = 'age';
    const TABLE_NAME    = 'users';

    public function up()
    {
        $tableName = self::TABLE_NAME;
        $newColumnName = self::COLUMN_NAME;
        $newColumnType = 'integer';
        $afterField = 'email';

        $table = $this->table($tableName);
        $table->addColumn($newColumnName, $newColumnType,  ['after' => $afterField]);
        $table->update();

    }

    public function down()
    {
        $tableName = self::TABLE_NAME;
        $columnName = self::COLUMN_NAME;

        $table = $this->table($tableName);
        $table->removeColumn($columnName);
        $table->save();
    }
}
