<?php

use yii\db\Migration;

class m160217_220345_tbl_categories extends Migration
{
    public function up()
    {
        $this->execute("
            CREATE TABLE IF NOT EXISTS `categories` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `uri` varchar(255) NOT NULL,
            `status` tinyint(4) NOT NULL DEFAULT '0',
            PRIMARY KEY (`id`),
            KEY `uri` (`uri`),
            KEY `status` (`status`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17;
        ");
    }

    public function down()
    {
        $this->dropTable('categories');

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
