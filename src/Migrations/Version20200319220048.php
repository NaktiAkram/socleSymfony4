<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200319220048 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ConfigMapVolumes ADD volume_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ConfigMapVolumes ADD CONSTRAINT FK_7CFE41BB8FD80EEA FOREIGN KEY (volume_id) REFERENCES Volumes (id)');
        $this->addSql('CREATE INDEX IDX_7CFE41BB8FD80EEA ON ConfigMapVolumes (volume_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ConfigMapVolumes DROP FOREIGN KEY FK_7CFE41BB8FD80EEA');
        $this->addSql('DROP INDEX IDX_7CFE41BB8FD80EEA ON ConfigMapVolumes');
        $this->addSql('ALTER TABLE ConfigMapVolumes DROP volume_id');
    }
}
