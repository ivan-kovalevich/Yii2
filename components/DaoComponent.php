<?php


namespace app\components;

use app\base\BaseComponent;
use yii\caching\DbDependency;
use yii\caching\TagDependency;
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
        $sql = 'select * from users';
        return $this->getDb()->createCommand($sql)->cache(10)->queryAll();
    }

    public function getActivityUser($user_id)
    {
        $sql = 'select * from activity where user_id = :user';
        return $this->getDb()->createCommand($sql, [':user' => $user_id])
            ->cache(10, new DbDependency(['sql' => 'select max(id) from activity where user_id='.(int)$user_id]))
            ->queryAll();
    }

    public function getActivityAny()
    {
        $query = new Query();
        $data = $query->from('activity')
            ->select(['id', 'title'])
            ->andWhere(['user_id' => 2])
            ->orderBy(['dateStart' => SORT_DESC])
            ->limit(2)
            ->cache()
            //  ->createCommand()->rawSql; #посмотреть чистый SQL-запрос
            ->one($this->getDb());

        return $data;
    }

    public function getCountActivity()
    {
        //TagDependency::invalidate(\Yii::$app->cache, 'active');
        $query = new Query();
        $data = $query->from('activity')
            ->select('count(id) as cnt')
            ->cache(10, new TagDependency(['tags' => 'active']))
            ->scalar($this->getDb());

        return $data;
    }

    //получать выборку из бд частями (cache не сработает)
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