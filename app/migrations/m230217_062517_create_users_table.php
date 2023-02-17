<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m230217_062517_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id'                 => $this->primaryKey(),
            'name'               => $this->string(50)->notNull()->comment('Имя пользователя'),
            'ip'                 => $this->string(50)->notNull()->comment('Ip пользователя'),
            'created_at'         => $this->integer()->comment('Дата добавления записи'),
            'updated_at'         => $this->integer()->comment('Дата изменения записи'),
        ]);

        $this->createIndex(
            'idx-users-id',
            '{{%users}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-users-id',
            '{{%users}}'
        );

        $this->dropTable('{{%users}}');
    }
}
