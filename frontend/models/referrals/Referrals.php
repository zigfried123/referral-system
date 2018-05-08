<?php

namespace app\models\referrals;

use common\exceptions\NotSaveException;
use common\models\User;
use Yii;

/**
 * This is the model class for table "referrals".
 *
 * @property int $id
 * @property int $user_id
 * @property int $ref_id
 * @property int $ref_count
 *
 * @property User $user
 */
class Referrals extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'referrals';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'ref_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'ref_id' => 'Ref ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function saveModel()
    {
        if ($this->find()->where(['ref_id' => $this->ref_id])->exists() || !$this->save())
            throw new NotSaveException('Model have been not saved');

        $this->updateCounterRefs();
    }

    public function updateCounterRefs()
    {
        if (!$this->save())
            throw new NotSaveException('Counters have been not increased');

    }

    public static function getReferralsId($userId)
    {
        return array_map(function ($item) {
            return $item['ref_id'];
        },self::find()->select('ref_id')->where(['user_id' => $userId])->asArray()->all());
    }

    public static function getUserId($userId)
    {
        return self::find()->select('user_id')->where(['ref_id'=>$userId])->scalar();
    }
}
