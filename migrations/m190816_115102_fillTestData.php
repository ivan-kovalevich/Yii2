<?php

use yii\db\Migration;

/**
 * Class m190816_115102_fillTestData
 */
class m190816_115102_fillTestData extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', [
            'id' => 1,
            'email' => 'ivan@mail.ru',
            'password_hash' => '123456'
        ]);
        $this->insert('user', [
            'id' => 2,
            'email' => 'ivan555@mail22.ru',
            'password_hash' => '123456'
        ]);

        $this->batchInsert('activity', ['title', 'dateStart', 'user_id', 'useNotification'], [
            [\Yii::$app->security->generateRandomString(), date('Y-m-d'), 1, 0],
            [\Yii::$app->security->generateRandomString(), date('Y-m-d'), 1, 1],
            [\Yii::$app->security->generateRandomString(), '2019-08-16', 1, 0],
            [\Yii::$app->security->generateRandomString(), date('Y-m-d'), 2, 0],
            [\Yii::$app->security->generateRandomString(), '2019-08-10', 2, 1],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user');
        $this->delete('activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190816_115102_fillTestData cannot be reverted.\n";

        return false;
    }
    */
}
