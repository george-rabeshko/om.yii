<?php

use yii\db\Migration;

class m160217_215740_tbl_articles extends Migration
{
    public function up()
    {
        $this->execute("
            CREATE TABLE IF NOT EXISTS `articles` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `title` varchar(255) NOT NULL,
            `content` text NOT NULL,
            `created` date NOT NULL,
            `updated` date NOT NULL,
            `category_id` int(11) NOT NULL,
            `comments_status` tinyint(4) NOT NULL DEFAULT '1',
            `indexed` tinyint(1) DEFAULT NULL,
            `status` tinyint(4) NOT NULL DEFAULT '10',
            PRIMARY KEY (`id`),
            KEY `category_id` (`category_id`),
            KEY `title` (`title`),
            KEY `title_2` (`title`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15;
        ");

        $this->addForeignKey('FK_ARTICLE_CATEGORY', 'articles', 'category_id', 'categories', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('FK_ARTICLE_CATEGORY', 'articles');
        $this->dropTable('articles');

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
