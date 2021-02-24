<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210224092743 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin_system ADD agence_partenaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE admin_system ADD CONSTRAINT FK_94852072D2F1AFD6 FOREIGN KEY (agence_partenaire_id) REFERENCES agence_partenaire (id)');
        $this->addSql('CREATE INDEX IDX_94852072D2F1AFD6 ON admin_system (agence_partenaire_id)');
        $this->addSql('ALTER TABLE compte_agence_partenaire ADD agence_partenaire_associee_id INT NOT NULL');
        $this->addSql('ALTER TABLE compte_agence_partenaire ADD CONSTRAINT FK_43AB1B00815D8863 FOREIGN KEY (agence_partenaire_associee_id) REFERENCES agence_partenaire (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_43AB1B00815D8863 ON compte_agence_partenaire (agence_partenaire_associee_id)');
        $this->addSql('ALTER TABLE depot ADD caissier_id INT NOT NULL, ADD compte_ap_id INT NOT NULL');
        $this->addSql('ALTER TABLE depot ADD CONSTRAINT FK_47948BBCB514973B FOREIGN KEY (caissier_id) REFERENCES admin_system (id)');
        $this->addSql('ALTER TABLE depot ADD CONSTRAINT FK_47948BBC69AEF235 FOREIGN KEY (compte_ap_id) REFERENCES compte_agence_partenaire (id)');
        $this->addSql('CREATE INDEX IDX_47948BBCB514973B ON depot (caissier_id)');
        $this->addSql('CREATE INDEX IDX_47948BBC69AEF235 ON depot (compte_ap_id)');
        $this->addSql('ALTER TABLE transaction ADD utilisateur_ap_id INT NOT NULL, ADD compte_ap_id INT NOT NULL');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1568A4D80 FOREIGN KEY (utilisateur_ap_id) REFERENCES admin_system (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D169AEF235 FOREIGN KEY (compte_ap_id) REFERENCES compte_agence_partenaire (id)');
        $this->addSql('CREATE INDEX IDX_723705D1568A4D80 ON transaction (utilisateur_ap_id)');
        $this->addSql('CREATE INDEX IDX_723705D169AEF235 ON transaction (compte_ap_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin_system DROP FOREIGN KEY FK_94852072D2F1AFD6');
        $this->addSql('DROP INDEX IDX_94852072D2F1AFD6 ON admin_system');
        $this->addSql('ALTER TABLE admin_system DROP agence_partenaire_id');
        $this->addSql('ALTER TABLE compte_agence_partenaire DROP FOREIGN KEY FK_43AB1B00815D8863');
        $this->addSql('DROP INDEX UNIQ_43AB1B00815D8863 ON compte_agence_partenaire');
        $this->addSql('ALTER TABLE compte_agence_partenaire DROP agence_partenaire_associee_id');
        $this->addSql('ALTER TABLE depot DROP FOREIGN KEY FK_47948BBCB514973B');
        $this->addSql('ALTER TABLE depot DROP FOREIGN KEY FK_47948BBC69AEF235');
        $this->addSql('DROP INDEX IDX_47948BBCB514973B ON depot');
        $this->addSql('DROP INDEX IDX_47948BBC69AEF235 ON depot');
        $this->addSql('ALTER TABLE depot DROP caissier_id, DROP compte_ap_id');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1568A4D80');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D169AEF235');
        $this->addSql('DROP INDEX IDX_723705D1568A4D80 ON transaction');
        $this->addSql('DROP INDEX IDX_723705D169AEF235 ON transaction');
        $this->addSql('ALTER TABLE transaction DROP utilisateur_ap_id, DROP compte_ap_id');
    }
}
