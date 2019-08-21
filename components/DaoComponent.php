<?php


namespace app\components;

use app\base\BaseComponent;
use yii\db\Connection;
use yii\db\Query;

class DaoComponent extends BaseComponent
{

    public function getDb(): Connection
    {
        return \Yii::$app->db;
    }

    public function getUsers()
    {
        $sql = 'select * from user';
        return $this->getDb()->createCommand($sql)->queryAll();
    }

    public function getActivityUser($user_id)
    {
        $sql = 'select * from activity where user_id = :user';
        return $this->getDb()->createCommand($sql, [':user' => $user_id])->queryAll();
    }

    public function getActivityAny()
    {
        $query = new Query();
        $data = $query->from('activity')
            ->select(['id', 'title'])
            ->andWhere(['user_id' => 2])
            ->orderBy(['dateStart' => SORT_DESC])
            ->limit(2)
            //  ->createCommand()->rawSql; #посмотреть чистый SQL-запрос
            ->one($this->getDb());

        return $data;
    }

    public function getCountActivity()
    {
        $query = new Query();
        $data = $query->from('activity')
            ->select('count(id) as cnt')
            ->scalar($this->getDb());

        return $data;
    }

    //получать выборку из бд частями
    public function getReaderActivity()
    {
        $query = new Query();
        $data = $query->from('activity')
            ->createCommand()->query();

        return $data;
    }

    public function updates()
    {

//        $this->getDb()->transaction(function (){
//            $this->getDb()->createCommand()
//                ->update('user',['email' => 'email2@email2.ru'], ['id' => 2])
//                ->execute();
//        });

        $transaction = $this->getDb()->beginTransaction();
        try {
            $this->getDb()->createCommand()
                ->update('user',['email' => 'email_new@email.ru'], ['id' => 1])
                ->execute();
            throw new \Exception('error');
            $this->getDb()->createCommand()
                ->update('user',['email' => 'email2@email2.ru'], ['id' => 2])
                ->execute();

            $transaction->commit();
        } catch (\Exception $e){
            $transaction->rollBack();
        }
    }
}