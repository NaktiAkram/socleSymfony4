<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200319220623 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE HostPath ADD pv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE HostPath ADD CONSTRAINT FK_E962F870E8A4F4B0 FOREIGN KEY (pv_id) REFERENCES PV (id)');
        $this->addSql('CREATE INDEX IDX_E962F870E8A4F4B0 ON HostPath (pv_id)');
        $this->addSql('ALTER TABLE NFS ADD pv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE NFS ADD CONSTRAINT FK_D1049115E8A4F4B0 FOREIGN KEY (pv_id) REFERENCES PV (id)');
        $this->addSql('CREATE INDEX IDX_D1049115E8A4F4B0 ON NFS (pv_id)');
        $this->addSql('ALTER TABLE GlusterFS ADD pv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE GlusterFS ADD CONSTRAINT FK_EBC65ABAE8A4F4B0 FOREIGN KEY (pv_id) REFERENCES PV (id)');
        $this->addSql('CREATE INDEX IDX_EBC65ABAE8A4F4B0 ON GlusterFS (pv_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE GlusterFS DROP FOREIGN KEY FK_EBC65ABAE8A4F4B0');
        $this->addSql('DROP INDEX IDX_EBC65ABAE8A4F4B0 ON GlusterFS');
        $this->addSql('ALTER TABLE GlusterFS DROP pv_id');
        $this->addSql('ALTER TABLE HostPath DROP FOREIGN KEY FK_E962F870E8A4F4B0');
        $this->addSql('DROP INDEX IDX_E962F870E8A4F4B0 ON HostPath');
        $this->addSql('ALTER TABLE HostPath DROP pv_id');
        $this->addSql('ALTER TABLE NFS DROP FOREIGN KEY FK_D1049115E8A4F4B0');
        $this->addSql('DROP INDEX IDX_D1049115E8A4F4B0 ON NFS');
        $this->addSql('ALTER TABLE NFS DROP pv_id');
    }
}
