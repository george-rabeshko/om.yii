<?php

use yii\db\Migration;

class m160217_220532_tbl_comments extends Migration
{
    public function up()
    {
        $this->execute("
            CREATE TABLE IF NOT EXISTS `comments` (
            `id` smallint(6) NOT NULL AUTO_INCREMENT,
            `author` varchar(50) NOT NULL,
            `content` text NOT NULL,
            `created` date NOT NULL,
            `updated` date DEFAULT NULL,
            `article_id` int(11) NOT NULL,
            `indexed` tinyint(1) NOT NULL DEFAULT '0',
            `status` tinyint(4) NOT NULL DEFAULT '0',
            PRIMARY KEY (`id`),
            KEY `article_id` (`article_id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36;
        ");

        $this->addForeignKey('FK_ARTICLE_ID', 'comments', 'article_id', 'articles', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('FK_ARTICLE_CATEGORY', 'comments');
        $this->dropTable('comments');

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
