<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200220084645 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fos_user_user CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL, CHANGE date_of_birth date_of_birth DATETIME DEFAULT NULL, CHANGE firstname firstname VARCHAR(64) DEFAULT NULL, CHANGE lastname lastname VARCHAR(64) DEFAULT NULL, CHANGE website website VARCHAR(64) DEFAULT NULL, CHANGE biography biography VARCHAR(1000) DEFAULT NULL, CHANGE gender gender VARCHAR(1) DEFAULT NULL, CHANGE locale locale VARCHAR(8) DEFAULT NULL, CHANGE timezone timezone VARCHAR(64) DEFAULT NULL, CHANGE phone phone VARCHAR(64) DEFAULT NULL, CHANGE facebook_uid facebook_uid VARCHAR(255) DEFAULT NULL, CHANGE facebook_name facebook_name VARCHAR(255) DEFAULT NULL, CHANGE facebook_data facebook_data JSON DEFAULT NULL, CHANGE twitter_uid twitter_uid VARCHAR(255) DEFAULT NULL, CHANGE twitter_name twitter_name VARCHAR(255) DEFAULT NULL, CHANGE twitter_data twitter_data JSON DEFAULT NULL, CHANGE gplus_uid gplus_uid VARCHAR(255) DEFAULT NULL, CHANGE gplus_name gplus_name VARCHAR(255) DEFAULT NULL, CHANGE gplus_data gplus_data JSON DEFAULT NULL, CHANGE token token VARCHAR(255) DEFAULT NULL, CHANGE two_step_code two_step_code VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE media__gallery_media CHANGE gallery_id gallery_id INT DEFAULT NULL, CHANGE media_id media_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media__media CHANGE provider_metadata provider_metadata JSON DEFAULT NULL, CHANGE width width INT DEFAULT NULL, CHANGE height height INT DEFAULT NULL, CHANGE length length NUMERIC(10, 0) DEFAULT NULL, CHANGE content_type content_type VARCHAR(255) DEFAULT NULL, CHANGE content_size content_size INT DEFAULT NULL, CHANGE copyright copyright VARCHAR(255) DEFAULT NULL, CHANGE author_name author_name VARCHAR(255) DEFAULT NULL, CHANGE context context VARCHAR(64) DEFAULT NULL, CHANGE cdn_is_flushable cdn_is_flushable TINYINT(1) DEFAULT NULL, CHANGE cdn_flush_identifier cdn_flush_identifier VARCHAR(64) DEFAULT NULL, CHANGE cdn_flush_at cdn_flush_at DATETIME DEFAULT NULL, CHANGE cdn_status cdn_status INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fos_user_user CHANGE salt salt VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE last_login last_login DATETIME DEFAULT \'NULL\', CHANGE confirmation_token confirmation_token VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE password_requested_at password_requested_at DATETIME DEFAULT \'NULL\', CHANGE date_of_birth date_of_birth DATETIME DEFAULT \'NULL\', CHANGE firstname firstname VARCHAR(64) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE lastname lastname VARCHAR(64) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE website website VARCHAR(64) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE biography biography VARCHAR(1000) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE gender gender VARCHAR(1) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE locale locale VARCHAR(8) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE timezone timezone VARCHAR(64) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE phone phone VARCHAR(64) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE facebook_uid facebook_uid VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE facebook_name facebook_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE facebook_data facebook_data LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_bin`, CHANGE twitter_uid twitter_uid VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE twitter_name twitter_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE twitter_data twitter_data LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_bin`, CHANGE gplus_uid gplus_uid VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE gplus_name gplus_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE gplus_data gplus_data LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_bin`, CHANGE token token VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE two_step_code two_step_code VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE media__gallery_media CHANGE gallery_id gallery_id INT DEFAULT NULL, CHANGE media_id media_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media__media CHANGE provider_metadata provider_metadata LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_bin`, CHANGE width width INT DEFAULT NULL, CHANGE height height INT DEFAULT NULL, CHANGE length length NUMERIC(10, 0) DEFAULT \'NULL\', CHANGE content_type content_type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE content_size content_size INT DEFAULT NULL, CHANGE copyright copyright VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE author_name author_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE context context VARCHAR(64) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE cdn_is_flushable cdn_is_flushable TINYINT(1) DEFAULT \'NULL\', CHANGE cdn_flush_identifier cdn_flush_identifier VARCHAR(64) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE cdn_flush_at cdn_flush_at DATETIME DEFAULT \'NULL\', CHANGE cdn_status cdn_status INT DEFAULT NULL');
    }
}
