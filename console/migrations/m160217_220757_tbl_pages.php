<?php

use yii\db\Migration;

class m160217_220757_tbl_pages extends Migration
{
    public function up()
    {
        $this->execute("
            CREATE TABLE IF NOT EXISTS `pages` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `content` text NOT NULL,
            `created` date NOT NULL,
            `updated` date NOT NULL,
            `uri` varchar(255) NOT NULL,
            `indexed` tinyint(1) NOT NULL DEFAULT '0',
            `status` tinyint(4) NOT NULL DEFAULT '10',
            PRIMARY KEY (`id`),
            KEY `uri` (`uri`),
            KEY `uri_2` (`uri`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;
        ");
    }

    public function down()
    {
        $this->dropTable('pages');

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
