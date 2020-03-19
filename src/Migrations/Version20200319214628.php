<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200319214628 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE environments_kubernetes (environments_id INT NOT NULL, kubernetes_id INT NOT NULL, INDEX IDX_B3B293EF1083D442 (environments_id), INDEX IDX_B3B293EF8680AB74 (kubernetes_id), PRIMARY KEY(environments_id, kubernetes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE environments_kubernetes ADD CONSTRAINT FK_B3B293EF1083D442 FOREIGN KEY (environments_id) REFERENCES Environments (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE environments_kubernetes ADD CONSTRAINT FK_B3B293EF8680AB74 FOREIGN KEY (kubernetes_id) REFERENCES Kubernetes (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE environments_kubernetes');
    }
}
