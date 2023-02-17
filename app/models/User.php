<?php
/**
 * User
 * Модель пользователь
 *
 */
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $ip
 * @property int $created_at
 * @property int $updated_at
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%users}}';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['name', 'ip'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['ip'], 'string', 'max' => 50],
            [['created_at', 'updated_at'], 'default', 'value' => null],
            [['created_at', 'updated_at'], 'safe'],

        ];
    }

    /**
     * @return array
     */
    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Title'),
            'ip' => Yii::t('app', 'Ip'),
            'created_at' => Yii::t('app', 'Created at'),
            'updated_at' => Yii::t('app', 'Updated at'),
        ];
    }

    public static function getUser(string $userIp): User
    {
        $user = User::find()->where(['ip' => $userIp])->one();
        if (empty($user)) {
            $user = new User();
            $user->ip = $userIp;
            $user->name = self::generateName();
            $user->save();
        }
        return $user;
    }

    /**
     * Метод генерирует имя пользователя
     * @return string
     */
    private static function generateName(): string
    {
        return 'Вася';
    }
}
