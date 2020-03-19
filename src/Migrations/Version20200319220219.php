<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200319220219 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Containers ADD job_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Containers ADD CONSTRAINT FK_DEF1A7DBBE04EA9 FOREIGN KEY (job_id) REFERENCES Job (id)');
        $this->addSql('CREATE INDEX IDX_DEF1A7DBBE04EA9 ON Containers (job_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Containers DROP FOREIGN KEY FK_DEF1A7DBBE04EA9');
        $this->addSql('DROP INDEX IDX_DEF1A7DBBE04EA9 ON Containers');
        $this->addSql('ALTER TABLE Containers DROP job_id');
    }
}
