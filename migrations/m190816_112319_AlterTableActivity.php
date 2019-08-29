<?php

use yii\db\Migration;

/**
 * Class m190816_112319_AlterTableActivity
 */
class m190816_112319_AlterTableActivity extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity', 'user_id', $this->integer()->notNull());

        $this->addForeignKey('activity_user_fk','activity','user_id',
            'users', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('activity_user_fk', 'activity');
        $this->dropColumn('activity', 'user_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190816_112319_AlterTableActivity cannot be reverted.\n";

        return false;
    }
    */
}
