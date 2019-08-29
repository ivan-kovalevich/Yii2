<?php


namespace app\components;


use yii\base\Component;

class RbacComponent extends Component
{
    /**
     * @return \yii\rbac\ManagerInterface
     */
    public function getManager()
    {
        return \Yii::$app->authManager;
    }

    public function initRbacRules()
    {
        $manager = $this->getManager();
        $manager->removeAll();

        //1. а) Объявляем и b) добавляем в бд роли
        //a)
        $admin = $manager->createRole('admin');
        $user = $manager->createRole('user');
        //b)
        $manager->add($admin);
        $manager->add($user);

        //2. a)Объявляем и b)добавляем в бд разрешения
        //a)
        $createActivity = $manager->createPermission('createActivity');
        $createActivity->description = 'Создание активностей';

        $viewEditAll = $manager->createPermission('viewEditAll');
        $viewEditAll->description = 'Просмотр и редактирование любых событий';

        $viewEditOwnerActivity = $manager->createPermission('viewEditOwnerActivity');
        $viewEditOwnerActivity->description = 'Просмотр и редактирование своего события';
        //b)
        $manager->add($createActivity);
        $manager->add($viewEditOwnerActivity);
        $manager->add($viewEditAll);

        //3. a)Объявляем и b)добавляем правила в бд
        //a)
//        $rule=new ViewEditOwnerActivityRule();
//        $viewEditOwnerActivity->ruleName=$rule->name;
//        //b)
//        $manager->add($rule);


        //4. Роль - набор разрешений и других ролей.
        //Привязка роли к разрешениям и другим ролям.
        $manager->addChild($user, $createActivity);
        $manager->addChild($user, $viewEditOwnerActivity);
        $manager->addChild($admin, $user);
        $manager->addChild($admin, $viewEditAll);


        //5. Привязка роли к пользователю
        $manager->assign($admin, 1);
        $manager->assign($user, 2);
    }


//    public function canCreateActivity(): bool
//    {
//        return \Yii::$app->user->can('createActivity');
//    }
//    public function canViewEditActivity(Activity $activity)
//    {
//        if(\Yii::$app->user->can('viewEditAll')){
//            return true;
//        }
//        if(\Yii::$app->user->can('viewEditOwnerActivity',['activity'=>$activity])){
//            return true;
//        }
//        return false;
//    }
}