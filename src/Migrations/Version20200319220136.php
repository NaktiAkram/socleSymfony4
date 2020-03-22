<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200319220136 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Items ADD configMapVolumes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Items ADD CONSTRAINT FK_20DFC6493AA903F6 FOREIGN KEY (configMapVolumes_id) REFERENCES ConfigMapVolumes (id)');
        $this->addSql('CREATE INDEX IDX_20DFC6493AA903F6 ON Items (configMapVolumes_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Items DROP FOREIGN KEY FK_20DFC6493AA903F6');
        $this->addSql('DROP INDEX IDX_20DFC6493AA903F6 ON Items');
        $this->addSql('ALTER TABLE Items DROP configMapVolumes_id');
    }
}
