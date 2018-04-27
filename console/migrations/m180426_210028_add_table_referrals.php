<?php

use yii\db\Migration;

/**
 * Class m180426_210028_add_table_referrals
 */
class m180426_210028_add_table_referrals extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('referrals',['id'=>$this->primaryKey(),'user_id'=>$this->integer(),'ref_id'=>$this->integer()]);

        $this->addForeignKey(
            'fk-referrals-id','referrals','user_id','user','id','CASCADE','RESTRICT'
        );

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('referrals');
        return true;
    }

}
