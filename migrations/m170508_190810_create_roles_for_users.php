<?php

use yii\db\Migration;
use app\models\user\UserRecord;
use yii\db\Schema;

class m170508_190810_create_roles_for_users extends Migration
{
    public function up()
    {
        $rbac = Yii::$app->authManager;
        
        $guest = $rbac->createRole('guest');
        $guest->description = 'Nobody';
        $rbac->add($guest);

        $user = $rbac->createRole('user');
        $user->description = 'Can use the query UI and nothing else';
        $rbac->add($user);

        $manager = $rbac->createRole('manager');
        $manager->description = 'Can manage entities in database, but not users';
        $rbac->add($manager);

        $admin = $rbac->createRole('admin');
        $admin->description = 'Can do anything including managing users';
        $rbac->add($admin);

        $rbac->addChild($admin, $manager);
        $rbac->addChild($manager, $user);
        $rbac->addChild($user, $guest);

        $rbac->assign(
            $user,
            UserRecord::findOne(['username' => 'JoeUser'])->id
        );
        $rbac->assign(
            $manager,
            UserRecord::findOne(['username' => 'AnnieManager'])->id
        );
        $rbac->assign(
            $admin,
            UserRecord::findOne(['username' => 'RobAdmin'])->id
        );
    }

    public function down()
    {
        $manager = Yii::$app->authManager;
        $manager->removeAll();
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
