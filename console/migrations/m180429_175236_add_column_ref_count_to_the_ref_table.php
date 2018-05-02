<?php

use yii\db\Migration;

/**
 * Class m180429_175236_add_column_ref_count_to_the_ref_table
 */
class m180429_175236_add_column_ref_count_to_the_ref_table extends Migration
{
    const TABLE = 'referrals';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(self::TABLE,'ref_count',$this->integer()->defaultValue(0));
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(self::TABLE,'ref_count');
        return true;
    }
}
