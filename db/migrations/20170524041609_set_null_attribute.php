<?php

use Phinx\Migration\AbstractMigration;

class SetNullAttribute extends AbstractMigration
{
    public function up()
    {
        $tableName = 'users';

        $columnToModify = $this->getColumnArray();
        $options = [
            'null'  => true,
        ];

        $table = $this->table($tableName);

        $columns = $table->getColumns();

        foreach ($columns as $dbColumn) {
            $dbColumnName = $dbColumn->getName();
            if (in_array($dbColumnName, $columnToModify)) {
                $columnType = $dbColumn->getType();
                $columnLength = $dbColumn->getLimit();
                if ($columnLength !== null) {
                    $options['limit'] = $columnLength;
                } else {
                    unset($options['limit']);
                }
                $table->changeColumn($dbColumnName, $columnType, $options);
            }
        }

        $table->update();
    }

    public function down()
    {
        $tableName = 'users';

        $columnToModify = $this->getColumnArray();
        $options = [
            'null'  => false,
        ];

        $table = $this->table($tableName);

        $columns = $table->getColumns();

        foreach ($columns as $dbColumn) {
            $dbColumnName = $dbColumn->getName();
            if (in_array($dbColumnName, $columnToModify)) {
                $columnType = $dbColumn->getType();
                $columnLength = $dbColumn->getLimit();
                if ($columnLength !== null) {
                    $options['limit'] = $columnLength;
                } else {
                    unset($options['limit']);
                }
                $table->changeColumn($dbColumnName, $columnType, $options);
            }
        }

        $table->update();
    }

    private function getColumnArray(): array
    {
        $columnList = [
            'username',
            'password',
            'password_salt',
            'email',
            'age',
            'first_name',
            'last_name',
        ];
        return $columnList;
    }
}
