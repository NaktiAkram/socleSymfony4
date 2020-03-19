<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200319214826 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Ports ADD services_id INT NOT NULL');
        $this->addSql('ALTER TABLE Ports ADD CONSTRAINT FK_485EFFC9AEF5A6C1 FOREIGN KEY (services_id) REFERENCES Services (id)');
        $this->addSql('CREATE INDEX IDX_485EFFC9AEF5A6C1 ON Ports (services_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Ports DROP FOREIGN KEY FK_485EFFC9AEF5A6C1');
        $this->addSql('DROP INDEX IDX_485EFFC9AEF5A6C1 ON Ports');
        $this->addSql('ALTER TABLE Ports DROP services_id');
    }
}
