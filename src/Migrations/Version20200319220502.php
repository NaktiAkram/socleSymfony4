<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200319220502 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE VolumeMounts ADD containers_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE VolumeMounts ADD CONSTRAINT FK_BC633CEF7F1FBC6E FOREIGN KEY (containers_id) REFERENCES Containers (id)');
        $this->addSql('CREATE INDEX IDX_BC633CEF7F1FBC6E ON VolumeMounts (containers_id)');
        $this->addSql('ALTER TABLE Variables ADD containers_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Variables ADD CONSTRAINT FK_A3AFFB27F1FBC6E FOREIGN KEY (containers_id) REFERENCES Containers (id)');
        $this->addSql('CREATE INDEX IDX_A3AFFB27F1FBC6E ON Variables (containers_id)');
        $this->addSql('ALTER TABLE Execute ADD containers_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Execute ADD CONSTRAINT FK_30DE29427F1FBC6E FOREIGN KEY (containers_id) REFERENCES Containers (id)');
        $this->addSql('CREATE INDEX IDX_30DE29427F1FBC6E ON Execute (containers_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Execute DROP FOREIGN KEY FK_30DE29427F1FBC6E');
        $this->addSql('DROP INDEX IDX_30DE29427F1FBC6E ON Execute');
        $this->addSql('ALTER TABLE Execute DROP containers_id');
        $this->addSql('ALTER TABLE Variables DROP FOREIGN KEY FK_A3AFFB27F1FBC6E');
        $this->addSql('DROP INDEX IDX_A3AFFB27F1FBC6E ON Variables');
        $this->addSql('ALTER TABLE Variables DROP containers_id');
        $this->addSql('ALTER TABLE VolumeMounts DROP FOREIGN KEY FK_BC633CEF7F1FBC6E');
        $this->addSql('DROP INDEX IDX_BC633CEF7F1FBC6E ON VolumeMounts');
        $this->addSql('ALTER TABLE VolumeMounts DROP containers_id');
    }
}
