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
        $this->insert('users', [
            'id' => 1,
            'email' => 'mail@mail.ru',
            'password_hash' => 'ojdei3ojijeidoj'
        ]);
        $this->insert('users', [
            'id' => 2,
            'email' => 'mail22@mail22.ru',
            'password_hash' => 'ojdei3ojijeidoj'
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
        $this->delete('users');
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
