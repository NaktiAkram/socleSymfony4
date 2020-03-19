<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200319214733 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Kubernetes ADD value_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Kubernetes ADD CONSTRAINT FK_9ACACB00F920BBA2 FOREIGN KEY (value_id) REFERENCES `Values` (id)');
        $this->addSql('CREATE INDEX IDX_9ACACB00F920BBA2 ON Kubernetes (value_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Kubernetes DROP FOREIGN KEY FK_9ACACB00F920BBA2');
        $this->addSql('DROP INDEX IDX_9ACACB00F920BBA2 ON Kubernetes');
        $this->addSql('ALTER TABLE Kubernetes DROP value_id');
    }
}
