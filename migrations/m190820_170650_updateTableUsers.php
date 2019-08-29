<?php

use yii\db\Migration;

/**
 * Class m190820_170650_updateTableUsers
 */
class m190820_170650_updateTableUsers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update('users', [
            'password_hash' => \Yii::$app->security->generatePasswordHash('123456'),
        ],
            'id' == 1);

        $this->update('users', [
            'password_hash' => \Yii::$app->security->generatePasswordHash('123456'),
        ],
            'id' == 2);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190820_170650_updateTableUsers cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190820_170650_updateTableUsers cannot be reverted.\n";

        return false;
    }
    */
}
