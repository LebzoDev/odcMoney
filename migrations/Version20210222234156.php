<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210222234156 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, archive TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin_system ADD profil_id INT NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD nom VARCHAR(255) NOT NULL, ADD archive TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE admin_system ADD CONSTRAINT FK_94852072275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('CREATE INDEX IDX_94852072275ED078 ON admin_system (profil_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin_system DROP FOREIGN KEY FK_94852072275ED078');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP INDEX IDX_94852072275ED078 ON admin_system');
        $this->addSql('ALTER TABLE admin_system DROP profil_id, DROP prenom, DROP nom, DROP archive');
    }
}
