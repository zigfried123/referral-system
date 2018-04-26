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
        $this->createTable('referrals',['id'=>$this->primaryKey(),'user_id'=>$this->integer(8),'ref_id'=>$this->integer(8)]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('referrals');
    }

}
