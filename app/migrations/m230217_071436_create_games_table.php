<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%games}}`.
 */
class m230217_071436_create_games_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%games}}', [
            'id' => $this->primaryKey(),
        ]);
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

        $this->dropTable('{{%games}}');
    }
}
