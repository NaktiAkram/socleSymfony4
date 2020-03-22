<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200319215927 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Containers ADD deployment_id INT NOT NULL');
        $this->addSql('ALTER TABLE Containers ADD CONSTRAINT FK_DEF1A7DB9DF4CE98 FOREIGN KEY (deployment_id) REFERENCES Deployments (id)');
        $this->addSql('CREATE INDEX IDX_DEF1A7DB9DF4CE98 ON Containers (deployment_id)');
        $this->addSql('ALTER TABLE Volumes ADD deployment_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Volumes ADD CONSTRAINT FK_B56193899DF4CE98 FOREIGN KEY (deployment_id) REFERENCES Deployments (id)');
        $this->addSql('CREATE INDEX IDX_B56193899DF4CE98 ON Volumes (deployment_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Containers DROP FOREIGN KEY FK_DEF1A7DB9DF4CE98');
        $this->addSql('DROP INDEX IDX_DEF1A7DB9DF4CE98 ON Containers');
        $this->addSql('ALTER TABLE Containers DROP deployment_id');
        $this->addSql('ALTER TABLE Volumes DROP FOREIGN KEY FK_B56193899DF4CE98');
        $this->addSql('DROP INDEX IDX_B56193899DF4CE98 ON Volumes');
        $this->addSql('ALTER TABLE Volumes DROP deployment_id');
    }
}
