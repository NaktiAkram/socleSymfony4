<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200319220317 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Containers ADD statefulSet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Containers ADD CONSTRAINT FK_DEF1A7DBD670DFAF FOREIGN KEY (statefulSet_id) REFERENCES StatefulSet (id)');
        $this->addSql('CREATE INDEX IDX_DEF1A7DBD670DFAF ON Containers (statefulSet_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Containers DROP FOREIGN KEY FK_DEF1A7DBD670DFAF');
        $this->addSql('DROP INDEX IDX_DEF1A7DBD670DFAF ON Containers');
        $this->addSql('ALTER TABLE Containers DROP statefulSet_id');
    }
}
