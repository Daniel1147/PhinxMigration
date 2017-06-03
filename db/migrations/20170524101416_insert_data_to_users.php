<?php

use Phinx\Migration\AbstractMigration;

class InsertDataToUsers extends AbstractMigration
{
    private $tableName = 'users';

    public function up()
    {
        $this->insert($this->tableName, $this->getDataToInsert());
    }

    public function down()
    {
        $query = "DELETE FROM {$this->tableName}";
        $this->execute($query);
    }

    public function getDataToInsert()
    {
        $rows = [
            [
                'username'      => 'Daniel',
                'password'      => '123456',
                'password_salt' => '123456',
                'email'         => 'abc@abc.abc',
                'age'           => '10',
                'first_name'    => 'Dan',
                'last_name'     => 'Iel',
            ],
            [
                'username'      => 'Da Ni Elll',
                'password'      => '123456',
                'password_salt' => '123456',
                'email'         => 'abc@abc.abc',
                'age'           => '1',
                'first_name'    => 'Elll',
                'last_name'     => 'Da Ni',
            ],
        ];

        return $rows;
    }
}
