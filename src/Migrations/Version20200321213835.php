<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200321213835 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE fos_user_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, date_of_birth DATETIME DEFAULT NULL, firstname VARCHAR(64) DEFAULT NULL, lastname VARCHAR(64) DEFAULT NULL, website VARCHAR(64) DEFAULT NULL, biography VARCHAR(1000) DEFAULT NULL, gender VARCHAR(1) DEFAULT NULL, locale VARCHAR(8) DEFAULT NULL, timezone VARCHAR(64) DEFAULT NULL, phone VARCHAR(64) DEFAULT NULL, facebook_uid VARCHAR(255) DEFAULT NULL, facebook_name VARCHAR(255) DEFAULT NULL, facebook_data JSON DEFAULT NULL, twitter_uid VARCHAR(255) DEFAULT NULL, twitter_name VARCHAR(255) DEFAULT NULL, twitter_data JSON DEFAULT NULL, gplus_uid VARCHAR(255) DEFAULT NULL, gplus_name VARCHAR(255) DEFAULT NULL, gplus_data JSON DEFAULT NULL, token VARCHAR(255) DEFAULT NULL, two_step_code VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_C560D76192FC23A8 (username_canonical), UNIQUE INDEX UNIQ_C560D761A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_C560D761C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user_user_group (user_id INT NOT NULL, group_id INT NOT NULL, INDEX IDX_B3C77447A76ED395 (user_id), INDEX IDX_B3C77447FE54D947 (group_id), PRIMARY KEY(user_id, group_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user_group (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_583D1F3E5E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media__gallery (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, context VARCHAR(64) NOT NULL, default_format VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media__media (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, enabled TINYINT(1) NOT NULL, provider_name VARCHAR(255) NOT NULL, provider_status INT NOT NULL, provider_reference VARCHAR(255) NOT NULL, provider_metadata JSON DEFAULT NULL, width INT DEFAULT NULL, height INT DEFAULT NULL, length NUMERIC(10, 0) DEFAULT NULL, content_type VARCHAR(255) DEFAULT NULL, content_size INT DEFAULT NULL, copyright VARCHAR(255) DEFAULT NULL, author_name VARCHAR(255) DEFAULT NULL, context VARCHAR(64) DEFAULT NULL, cdn_is_flushable TINYINT(1) DEFAULT NULL, cdn_flush_identifier VARCHAR(64) DEFAULT NULL, cdn_flush_at DATETIME DEFAULT NULL, cdn_status INT DEFAULT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_5C6DD74E12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media__gallery_media (id INT AUTO_INCREMENT NOT NULL, gallery_id INT DEFAULT NULL, media_id INT DEFAULT NULL, position INT NOT NULL, enabled TINYINT(1) NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_80D4C5414E7AF8F (gallery_id), INDEX IDX_80D4C541EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classification__collection (id INT AUTO_INCREMENT NOT NULL, context VARCHAR(255) DEFAULT NULL, media_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_A406B56AE25D857E (context), INDEX IDX_A406B56AEA9FDD75 (media_id), UNIQUE INDEX tag_collection (slug, context), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classification__category (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, context VARCHAR(255) DEFAULT NULL, media_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, position INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_43629B36727ACA70 (parent_id), INDEX IDX_43629B36E25D857E (context), INDEX IDX_43629B36EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classification__context (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classification__tag (id INT AUTO_INCREMENT NOT NULL, context VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_CA57A1C7E25D857E (context), UNIQUE INDEX tag_context (slug, context), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ConfigMapVolumes (id INT AUTO_INCREMENT NOT NULL, volume_id INT DEFAULT NULL, configNameName VARCHAR(255) NOT NULL, INDEX IDX_7CFE41BB8FD80EEA (volume_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE HostPath (id INT AUTO_INCREMENT NOT NULL, pv_id INT DEFAULT NULL, path VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_E962F870E8A4F4B0 (pv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Execute (id INT AUTO_INCREMENT NOT NULL, containers_id INT DEFAULT NULL, command VARCHAR(255) NOT NULL, args VARCHAR(255) NOT NULL, INDEX IDX_30DE29427F1FBC6E (containers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Ports (id INT AUTO_INCREMENT NOT NULL, services_id INT NOT NULL, protocol VARCHAR(255) NOT NULL, port INT NOT NULL, targetPort INT NOT NULL, nodePort INT NOT NULL, INDEX IDX_485EFFC9AEF5A6C1 (services_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Environments (id INT AUTO_INCREMENT NOT NULL, env VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE environments_kubernetes (environments_id INT NOT NULL, kubernetes_id INT NOT NULL, INDEX IDX_B3B293EF1083D442 (environments_id), INDEX IDX_B3B293EF8680AB74 (kubernetes_id), PRIMARY KEY(environments_id, kubernetes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Variables (id INT AUTO_INCREMENT NOT NULL, containers_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, INDEX IDX_A3AFFB27F1FBC6E (containers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Kubernetes (id INT AUTO_INCREMENT NOT NULL, kind VARCHAR(255) NOT NULL, apiVersion VARCHAR(255) NOT NULL, namespace VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, labels LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE StatefulSet (id INT AUTO_INCREMENT NOT NULL, kind VARCHAR(255) NOT NULL, apiVersion VARCHAR(255) NOT NULL, namespace VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, labels LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', selector VARCHAR(255) NOT NULL, replicas INT DEFAULT NULL, terminationGracePeriodSeconds INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Volumes (id INT AUTO_INCREMENT NOT NULL, deployment_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_B56193899DF4CE98 (deployment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ConfigMap (id INT AUTO_INCREMENT NOT NULL, kind VARCHAR(255) NOT NULL, apiVersion VARCHAR(255) NOT NULL, namespace VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, labels LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', data VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE PV (id INT AUTO_INCREMENT NOT NULL, kind VARCHAR(255) NOT NULL, apiVersion VARCHAR(255) NOT NULL, namespace VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, labels LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', storageClassName VARCHAR(255) NOT NULL, storageCapacity VARCHAR(255) NOT NULL, accessMode VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Secrets (id INT AUTO_INCREMENT NOT NULL, kind VARCHAR(255) NOT NULL, apiVersion VARCHAR(255) NOT NULL, namespace VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, labels LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', secretKey VARCHAR(255) NOT NULL, secretValue VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Services (id INT AUTO_INCREMENT NOT NULL, kind VARCHAR(255) NOT NULL, apiVersion VARCHAR(255) NOT NULL, namespace VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, labels LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', selector VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, sessionAffinity LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE PVC (id INT AUTO_INCREMENT NOT NULL, kind VARCHAR(255) NOT NULL, apiVersion VARCHAR(255) NOT NULL, namespace VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, labels LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', storageClassName VARCHAR(255) NOT NULL, storageCapacity VARCHAR(255) NOT NULL, accessMode VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Items (id INT AUTO_INCREMENT NOT NULL, itemKey VARCHAR(255) NOT NULL, itemValue VARCHAR(255) NOT NULL, configMapVolumes_id INT DEFAULT NULL, INDEX IDX_20DFC6493AA903F6 (configMapVolumes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Job (id INT AUTO_INCREMENT NOT NULL, kind VARCHAR(255) NOT NULL, apiVersion VARCHAR(255) NOT NULL, namespace VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, labels LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', restartPolicy VARCHAR(255) NOT NULL, backoffLimit VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE VolumeMounts (id INT AUTO_INCREMENT NOT NULL, containers_id INT DEFAULT NULL, mountPath VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, subPath VARCHAR(255) NOT NULL, INDEX IDX_BC633CEF7F1FBC6E (containers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE NFS (id INT AUTO_INCREMENT NOT NULL, pv_id INT DEFAULT NULL, server VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, INDEX IDX_D1049115E8A4F4B0 (pv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE EndPoints (id INT AUTO_INCREMENT NOT NULL, kind VARCHAR(255) NOT NULL, apiVersion VARCHAR(255) NOT NULL, namespace VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, labels LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ipAdress VARCHAR(255) NOT NULL, port VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Value (id INT AUTO_INCREMENT NOT NULL, `key` VARCHAR(255) NOT NULL, subkey VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Containers (id INT AUTO_INCREMENT NOT NULL, deployment_id INT NOT NULL, job_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, tag VARCHAR(255) NOT NULL, repository VARCHAR(255) NOT NULL, port INT NOT NULL, mountPath VARCHAR(255) NOT NULL, statefulSet_id INT DEFAULT NULL, INDEX IDX_DEF1A7DB9DF4CE98 (deployment_id), INDEX IDX_DEF1A7DBBE04EA9 (job_id), INDEX IDX_DEF1A7DBD670DFAF (statefulSet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Deployments (id INT AUTO_INCREMENT NOT NULL, kind VARCHAR(255) NOT NULL, apiVersion VARCHAR(255) NOT NULL, namespace VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, labels LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', selector VARCHAR(255) NOT NULL, replicas INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE GlusterFS (id INT AUTO_INCREMENT NOT NULL, pv_id INT DEFAULT NULL, endPoint VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, readOnly TINYINT(1) NOT NULL, INDEX IDX_EBC65ABAE8A4F4B0 (pv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fos_user_user_group ADD CONSTRAINT FK_B3C77447A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fos_user_user_group ADD CONSTRAINT FK_B3C77447FE54D947 FOREIGN KEY (group_id) REFERENCES fos_user_group (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media__media ADD CONSTRAINT FK_5C6DD74E12469DE2 FOREIGN KEY (category_id) REFERENCES classification__category (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE media__gallery_media ADD CONSTRAINT FK_80D4C5414E7AF8F FOREIGN KEY (gallery_id) REFERENCES media__gallery (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media__gallery_media ADD CONSTRAINT FK_80D4C541EA9FDD75 FOREIGN KEY (media_id) REFERENCES media__media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classification__collection ADD CONSTRAINT FK_A406B56AE25D857E FOREIGN KEY (context) REFERENCES classification__context (id)');
        $this->addSql('ALTER TABLE classification__collection ADD CONSTRAINT FK_A406B56AEA9FDD75 FOREIGN KEY (media_id) REFERENCES media__media (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE classification__category ADD CONSTRAINT FK_43629B36727ACA70 FOREIGN KEY (parent_id) REFERENCES classification__category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classification__category ADD CONSTRAINT FK_43629B36E25D857E FOREIGN KEY (context) REFERENCES classification__context (id)');
        $this->addSql('ALTER TABLE classification__category ADD CONSTRAINT FK_43629B36EA9FDD75 FOREIGN KEY (media_id) REFERENCES media__media (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE classification__tag ADD CONSTRAINT FK_CA57A1C7E25D857E FOREIGN KEY (context) REFERENCES classification__context (id)');
        $this->addSql('ALTER TABLE ConfigMapVolumes ADD CONSTRAINT FK_7CFE41BB8FD80EEA FOREIGN KEY (volume_id) REFERENCES Volumes (id)');
        $this->addSql('ALTER TABLE HostPath ADD CONSTRAINT FK_E962F870E8A4F4B0 FOREIGN KEY (pv_id) REFERENCES PV (id)');
        $this->addSql('ALTER TABLE Execute ADD CONSTRAINT FK_30DE29427F1FBC6E FOREIGN KEY (containers_id) REFERENCES Containers (id)');
        $this->addSql('ALTER TABLE Ports ADD CONSTRAINT FK_485EFFC9AEF5A6C1 FOREIGN KEY (services_id) REFERENCES Services (id)');
        $this->addSql('ALTER TABLE environments_kubernetes ADD CONSTRAINT FK_B3B293EF1083D442 FOREIGN KEY (environments_id) REFERENCES Environments (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE environments_kubernetes ADD CONSTRAINT FK_B3B293EF8680AB74 FOREIGN KEY (kubernetes_id) REFERENCES Kubernetes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Variables ADD CONSTRAINT FK_A3AFFB27F1FBC6E FOREIGN KEY (containers_id) REFERENCES Containers (id)');
        $this->addSql('ALTER TABLE Volumes ADD CONSTRAINT FK_B56193899DF4CE98 FOREIGN KEY (deployment_id) REFERENCES Deployments (id)');
        $this->addSql('ALTER TABLE Items ADD CONSTRAINT FK_20DFC6493AA903F6 FOREIGN KEY (configMapVolumes_id) REFERENCES ConfigMapVolumes (id)');
        $this->addSql('ALTER TABLE VolumeMounts ADD CONSTRAINT FK_BC633CEF7F1FBC6E FOREIGN KEY (containers_id) REFERENCES Containers (id)');
        $this->addSql('ALTER TABLE NFS ADD CONSTRAINT FK_D1049115E8A4F4B0 FOREIGN KEY (pv_id) REFERENCES PV (id)');
        $this->addSql('ALTER TABLE Containers ADD CONSTRAINT FK_DEF1A7DB9DF4CE98 FOREIGN KEY (deployment_id) REFERENCES Deployments (id)');
        $this->addSql('ALTER TABLE Containers ADD CONSTRAINT FK_DEF1A7DBBE04EA9 FOREIGN KEY (job_id) REFERENCES Job (id)');
        $this->addSql('ALTER TABLE Containers ADD CONSTRAINT FK_DEF1A7DBD670DFAF FOREIGN KEY (statefulSet_id) REFERENCES StatefulSet (id)');
        $this->addSql('ALTER TABLE GlusterFS ADD CONSTRAINT FK_EBC65ABAE8A4F4B0 FOREIGN KEY (pv_id) REFERENCES PV (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fos_user_user_group DROP FOREIGN KEY FK_B3C77447A76ED395');
        $this->addSql('ALTER TABLE fos_user_user_group DROP FOREIGN KEY FK_B3C77447FE54D947');
        $this->addSql('ALTER TABLE media__gallery_media DROP FOREIGN KEY FK_80D4C5414E7AF8F');
        $this->addSql('ALTER TABLE media__gallery_media DROP FOREIGN KEY FK_80D4C541EA9FDD75');
        $this->addSql('ALTER TABLE classification__collection DROP FOREIGN KEY FK_A406B56AEA9FDD75');
        $this->addSql('ALTER TABLE classification__category DROP FOREIGN KEY FK_43629B36EA9FDD75');
        $this->addSql('ALTER TABLE media__media DROP FOREIGN KEY FK_5C6DD74E12469DE2');
        $this->addSql('ALTER TABLE classification__category DROP FOREIGN KEY FK_43629B36727ACA70');
        $this->addSql('ALTER TABLE classification__collection DROP FOREIGN KEY FK_A406B56AE25D857E');
        $this->addSql('ALTER TABLE classification__category DROP FOREIGN KEY FK_43629B36E25D857E');
        $this->addSql('ALTER TABLE classification__tag DROP FOREIGN KEY FK_CA57A1C7E25D857E');
        $this->addSql('ALTER TABLE Items DROP FOREIGN KEY FK_20DFC6493AA903F6');
        $this->addSql('ALTER TABLE environments_kubernetes DROP FOREIGN KEY FK_B3B293EF1083D442');
        $this->addSql('ALTER TABLE environments_kubernetes DROP FOREIGN KEY FK_B3B293EF8680AB74');
        $this->addSql('ALTER TABLE Containers DROP FOREIGN KEY FK_DEF1A7DBD670DFAF');
        $this->addSql('ALTER TABLE ConfigMapVolumes DROP FOREIGN KEY FK_7CFE41BB8FD80EEA');
        $this->addSql('ALTER TABLE HostPath DROP FOREIGN KEY FK_E962F870E8A4F4B0');
        $this->addSql('ALTER TABLE NFS DROP FOREIGN KEY FK_D1049115E8A4F4B0');
        $this->addSql('ALTER TABLE GlusterFS DROP FOREIGN KEY FK_EBC65ABAE8A4F4B0');
        $this->addSql('ALTER TABLE Ports DROP FOREIGN KEY FK_485EFFC9AEF5A6C1');
        $this->addSql('ALTER TABLE Containers DROP FOREIGN KEY FK_DEF1A7DBBE04EA9');
        $this->addSql('ALTER TABLE Execute DROP FOREIGN KEY FK_30DE29427F1FBC6E');
        $this->addSql('ALTER TABLE Variables DROP FOREIGN KEY FK_A3AFFB27F1FBC6E');
        $this->addSql('ALTER TABLE VolumeMounts DROP FOREIGN KEY FK_BC633CEF7F1FBC6E');
        $this->addSql('ALTER TABLE Volumes DROP FOREIGN KEY FK_B56193899DF4CE98');
        $this->addSql('ALTER TABLE Containers DROP FOREIGN KEY FK_DEF1A7DB9DF4CE98');
        $this->addSql('DROP TABLE fos_user_user');
        $this->addSql('DROP TABLE fos_user_user_group');
        $this->addSql('DROP TABLE fos_user_group');
        $this->addSql('DROP TABLE media__gallery');
        $this->addSql('DROP TABLE media__media');
        $this->addSql('DROP TABLE media__gallery_media');
        $this->addSql('DROP TABLE classification__collection');
        $this->addSql('DROP TABLE classification__category');
        $this->addSql('DROP TABLE classification__context');
        $this->addSql('DROP TABLE classification__tag');
        $this->addSql('DROP TABLE ConfigMapVolumes');
        $this->addSql('DROP TABLE HostPath');
        $this->addSql('DROP TABLE Execute');
        $this->addSql('DROP TABLE Ports');
        $this->addSql('DROP TABLE Environments');
        $this->addSql('DROP TABLE environments_kubernetes');
        $this->addSql('DROP TABLE Variables');
        $this->addSql('DROP TABLE Kubernetes');
        $this->addSql('DROP TABLE StatefulSet');
        $this->addSql('DROP TABLE Volumes');
        $this->addSql('DROP TABLE ConfigMap');
        $this->addSql('DROP TABLE PV');
        $this->addSql('DROP TABLE Secrets');
        $this->addSql('DROP TABLE Services');
        $this->addSql('DROP TABLE PVC');
        $this->addSql('DROP TABLE Items');
        $this->addSql('DROP TABLE Job');
        $this->addSql('DROP TABLE VolumeMounts');
        $this->addSql('DROP TABLE NFS');
        $this->addSql('DROP TABLE EndPoints');
        $this->addSql('DROP TABLE Value');
        $this->addSql('DROP TABLE Containers');
        $this->addSql('DROP TABLE Deployments');
        $this->addSql('DROP TABLE GlusterFS');
    }
}
