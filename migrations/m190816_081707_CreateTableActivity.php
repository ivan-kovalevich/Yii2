<?php

use yii\db\Migration;

/**
 * Class m190816_081707_CreateTableActivity
 */
class m190816_081707_CreateTableActivity extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activity', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100)->notNull(),
            'description' => $this->text(),
            'dateStart' => $this->date()->notNull(),
            'dateEnd' => $this->date(),
            'isBlocked' => $this->boolean()->notNull()->defaultValue(0),
            'isRepeated' => $this->boolean()->notNull()->defaultValue(0),
            'useNotification' => $this->boolean()->notNull()->defaultValue(0),
            'email' => $this->string(100),
            'createAt' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'isDeleted' => $this->boolean()->notNull()->defaultValue(0)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190816_081707_CreateTableActivity cannot be reverted.\n";

        return false;
    }
    */
}
