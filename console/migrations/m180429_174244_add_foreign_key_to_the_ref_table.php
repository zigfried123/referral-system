<?php

use yii\db\Migration;

/**
 * Class m180429_174244_add_foreign_key_to_the_ref_table
 */
class m180429_174244_add_foreign_key_to_the_ref_table extends Migration
{
    const TABLE = 'referrals';
    const FOREIGN_KEY = 'fk-referrals-ref_id';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk-referrals-ref_id',self::TABLE,'ref_id','user','id','CASCADE');
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(self::FOREIGN_KEY,self::TABLE);
        return true;
    }


}
