<?php

use yii\db\Migration;

/**
 * Class m190816_105823_CreateTableUser
 */
class m190816_105823_CreateTableUser extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'email' => $this->string(150)->notNull(),
            'password_hash' => $this->string(150)->notNull(),
            'description' => $this->text(),
            'token' => $this->string(150),
            'auth_key' => $this->string(150),
            'createAt' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'isDeleted' => $this->boolean()->notNull()->defaultValue(0)
        ]);

        $this->createIndex('userEmailUni', 'users', 'email', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('userEmailUni','users');
        $this->dropTable('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190816_105823_CreateTableUser cannot be reverted.\n";

        return false;
    }
    */
}
