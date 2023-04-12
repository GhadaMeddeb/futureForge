<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412041119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abonnement DROP id_offre');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY foreignkey');
        $this->addSql('ALTER TABLE avis CHANGE id_offre id_offre INT DEFAULT NULL, CHANGE id_user id_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF04103C75F FOREIGN KEY (id_offre) REFERENCES offre (id_offre)');
        $this->addSql('ALTER TABLE etudiant CHANGE username username VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE evenements DROP FOREIGN KEY evenements_ibfk_1');
        $this->addSql('ALTER TABLE evenements CHANGE Categorie_id Categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evenements ADD CONSTRAINT FK_E10AD400A4C43CD5 FOREIGN KEY (Categorie_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE messagerie DROP FOREIGN KEY messagerie_ibfk_1');
        $this->addSql('ALTER TABLE messagerie CHANGE user user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE messagerie ADD CONSTRAINT FK_14E8F60C8D93D649 FOREIGN KEY (user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY offre_user');
        $this->addSql('ALTER TABLE offre CHANGE id_user id_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F6B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE offre2 CHANGE dateF dateF DATE NOT NULL');
        $this->addSql('ALTER TABLE reclamation CHANGE id_u id_u INT DEFAULT NULL, CHANGE TypeR TypeR VARCHAR(255) NOT NULL, CHANGE DescriptionR DescriptionR VARCHAR(255) NOT NULL, CHANGE Objet Objet VARCHAR(255) NOT NULL, CHANGE etat etat VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abonnement ADD id_offre INT DEFAULT NULL');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF04103C75F');
        $this->addSql('ALTER TABLE avis CHANGE id_offre id_offre INT NOT NULL, CHANGE id_user id_user INT NOT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT foreignkey FOREIGN KEY (id_offre) REFERENCES offre (id_offre) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etudiant CHANGE username username VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE evenements DROP FOREIGN KEY FK_E10AD400A4C43CD5');
        $this->addSql('ALTER TABLE evenements CHANGE Categorie_id Categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE evenements ADD CONSTRAINT evenements_ibfk_1 FOREIGN KEY (Categorie_id) REFERENCES categories (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE messagerie DROP FOREIGN KEY FK_14E8F60C8D93D649');
        $this->addSql('ALTER TABLE messagerie CHANGE user user INT NOT NULL');
        $this->addSql('ALTER TABLE messagerie ADD CONSTRAINT messagerie_ibfk_1 FOREIGN KEY (user) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F6B3CA4B');
        $this->addSql('ALTER TABLE offre CHANGE id_user id_user INT NOT NULL');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT offre_user FOREIGN KEY (id_user) REFERENCES user (id_user) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offre2 CHANGE dateF dateF DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE reclamation CHANGE id_u id_u INT DEFAULT 1 NOT NULL, CHANGE TypeR TypeR VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE DescriptionR DescriptionR VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE Objet Objet VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE etat etat VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
    }
}
