<?php
/**
 * GameStatus
 * Модель статусы игры
 *
 */
namespace app\models;

class GameStatus
{
    public const NEW_GAME = 1;
    public const RUNNING_GAME = 2;
    public const END_GAME = 3;

    /**
     * Метод возвращает
     * @return int[]
     */
    public static function getStatuses(): array
    {
        return [
            self::NEW_GAME,
            self::RUNNING_GAME,
            self::END_GAME,
        ];
    }

    /**
     * Метод проверят существует ли такой статус
     * @param int $status
     * @return bool
     */
    public static function isExistStatus(int $status): bool
    {
        return in_array($status, self::getStatuses());
    }
}
