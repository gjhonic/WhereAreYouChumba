<?php
/**
 * Game
 * Модель игры
 *
 */
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "games".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int $user_id
 * @property int $status_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $user
 */
class Game extends \yii\db\ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%games}}';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['name', 'ip', 'code'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['code'], 'string', 'max' => 10],
            //Автор игры
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(),
                'targetAttribute' => ['user_id' => 'id']],
            [['status_id'], 'validStatus'],
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
            'created_at' => Yii::t('app', 'Created at'),
            'updated_at' => Yii::t('app', 'Updated at'),
        ];
    }

    /**
     * Валидация статуса
     * @param $attribute
     * @param $params
     * @return void
     */
    public function validStatus($attribute, $params) {
        if (!GameStatus::isExistStatus((int)$attribute)) {
            $this->addError($attribute, 'Status not exist');
        }
    }

    /**
     * Метод генерирует уникальный код
     * @return string
     */
    private function generateCode(): string
    {
        $permittedChars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $code = substr(str_shuffle($permittedChars), 0, 10);

        $isExistGameWithThisCode = self::find()->where(['code' => $code])->exists();

        while ($isExistGameWithThisCode) {
            $code = substr(str_shuffle($permittedChars), 0, 10);
            $isExistGameWithThisCode = self::find()->where(['code' => $code])->exists();
        }

        return $code;
    }
}
