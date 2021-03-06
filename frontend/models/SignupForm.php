<?php
namespace frontend\models;

use \app\models\referrals\Referrals;
use yii\base\Exception;
use yii\base\Model;
use common\models\User;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function signup($ref)
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;

        $user->setPassword($this->password);
        $user->generateAuthKey();

        $transaction = \Yii::$app->db->beginTransaction();

        try {
            if ($user->save()) {
                if (isset($ref)) {
                    $refId = $user->id;
                    $findUser = $user->findEmailByRef($ref);
                    /* @var $findUser mixed*/
                    $referrals = new Referrals(['ref_id'=>$refId,'user_id'=>$findUser->id]);
                    $referrals->saveModel();
                }
                $transaction->commit();
                return $user;
            }
        } catch (Exception $e) {
            $transaction->rollback();
        }
        return false;
    }
}
