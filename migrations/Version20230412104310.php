<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412104310 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ETRE_PROPOSEE DROP FOREIGN KEY FK_ETRE_PROPOSEE_FORMULESANSCHAUFFEUR');
        $this->addSql('ALTER TABLE ETRE_PROPOSEE DROP FOREIGN KEY FK_ETRE_PROPOSEE_MODELE');
        $this->addSql('ALTER TABLE VEHICULE DROP FOREIGN KEY FK_VEHICULE_MODELE');
        $this->addSql('ALTER TABLE FORMULEAVECCHAUFFEUR DROP FOREIGN KEY FK_FORMULEAVECCHAUFFEUR_FORMULE');
        $this->addSql('ALTER TABLE FORMULESANSCHAUFFEUR DROP FOREIGN KEY FK_FORMULESANSCHAUFFEUR_FORMULE');
        $this->addSql('ALTER TABLE LOCATIONAVECCHAUFFEUR DROP FOREIGN KEY FK_LOCATIONAVECCHAUFFEUR_LOCATION');
        $this->addSql('ALTER TABLE LOCATIONAVECCHAUFFEUR DROP FOREIGN KEY FK_LOCATIONAVECCHAUFFEUR_FORMULEAVECCHAUFFEUR');
        $this->addSql('ALTER TABLE LOCATIONSANSCHAUFFEUR DROP FOREIGN KEY FK_LOCATIONSANSCHAUFFEUR_FORMULESANSCHAUFFEUR');
        $this->addSql('ALTER TABLE LOCATIONSANSCHAUFFEUR DROP FOREIGN KEY FK_LOCATIONSANSCHAUFFEUR_LOCATION');
        $this->addSql('ALTER TABLE LOCATION DROP FOREIGN KEY FK_LOCATION_CLIENT');
        $this->addSql('ALTER TABLE LOCATION DROP FOREIGN KEY FK_LOCATION_VEHICULE');
        $this->addSql('DROP TABLE FORMULE');
        $this->addSql('DROP TABLE ETRE_PROPOSEE');
        $this->addSql('DROP TABLE VEHICULE');
        $this->addSql('DROP TABLE FORMULEAVECCHAUFFEUR');
        $this->addSql('DROP TABLE FORMULESANSCHAUFFEUR');
        $this->addSql('DROP TABLE LOCATIONAVECCHAUFFEUR');
        $this->addSql('DROP TABLE LOCATIONSANSCHAUFFEUR');
        $this->addSql('DROP TABLE LOCATION');
        $this->addSql('ALTER TABLE CLIENT CHANGE ID id INT AUTO_INCREMENT NOT NULL, CHANGE NOM nom VARCHAR(32) NOT NULL, CHANGE PRENOM prenom VARCHAR(32) NOT NULL, CHANGE EMAIL email VARCHAR(50) NOT NULL, CHANGE TEL tel VARCHAR(10) NOT NULL, CHANGE ADRESSE adresse VARCHAR(50) NOT NULL, CHANGE CP cp VARCHAR(5) NOT NULL, CHANGE VILLE ville VARCHAR(32) NOT NULL, CHANGE MDP mdp VARCHAR(64) NOT NULL, CHANGE ROLES ROLES LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('ALTER TABLE MODELE CHANGE ID id INT AUTO_INCREMENT NOT NULL, CHANGE NOM nom VARCHAR(32) NOT NULL, CHANGE TARIFKMSUPPLEMENTAIRE tarifkmsupplementaire INT NOT NULL, CHANGE NBPLACES nbplaces INT NOT NULL, CHANGE VITESSEMAX vitessemax INT NOT NULL, CHANGE DESCRIPTION description VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE FORMULE (ID INT NOT NULL, LIBELLE CHAR(32) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ETRE_PROPOSEE (ID_1 INT NOT NULL, ID INT NOT NULL, INDEX I_FK_ETRE_PROPOSEE_FORMULESANSCHAUFFEUR (ID_1), INDEX I_FK_ETRE_PROPOSEE_MODELE (ID), PRIMARY KEY(ID_1, ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE VEHICULE (IMMATRICULATION INT NOT NULL, ID INT NOT NULL, DATEACHAT DATE DEFAULT NULL, INDEX I_FK_VEHICULE_MODELE (ID), PRIMARY KEY(IMMATRICULATION)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE FORMULEAVECCHAUFFEUR (ID INT NOT NULL, LIBELLE CHAR(32) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE FORMULESANSCHAUFFEUR (ID INT NOT NULL, DUREE DATE DEFAULT NULL, NBKMINCLUS INT DEFAULT NULL, LIBELLE CHAR(32) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE LOCATIONAVECCHAUFFEUR (NUMLOCATION INT NOT NULL, ID INT NOT NULL, DATELOCATION DATE DEFAULT NULL, MONTANTREGLE INT DEFAULT NULL, DATEHREDEPARTPREVU DATETIME DEFAULT NULL, DATEHREDEPARTREEL DATETIME DEFAULT NULL, DATEHRERETOURPREVU DATETIME DEFAULT NULL, DATEHRERETOURREEL DATETIME DEFAULT NULL, INDEX I_FK_LOCATIONAVECCHAUFFEUR_FORMULEAVECCHAUFFEUR (ID), PRIMARY KEY(NUMLOCATION)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE LOCATIONSANSCHAUFFEUR (NUMLOCATION INT NOT NULL, ID INT NOT NULL, NBKMDEPART INT DEFAULT NULL, NBKMRETOUR INT DEFAULT NULL, DATELOCATION DATE DEFAULT NULL, MONTANTREGLE INT DEFAULT NULL, DATEHREDEPARTPREVU DATETIME DEFAULT NULL, DATEHREDEPARTREEL DATETIME DEFAULT NULL, DATEHRERETOURPREVU DATETIME DEFAULT NULL, DATEHRERETOURREEL DATETIME DEFAULT NULL, INDEX I_FK_LOCATIONSANSCHAUFFEUR_FORMULESANSCHAUFFEUR (ID), PRIMARY KEY(NUMLOCATION)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE LOCATION (NUMLOCATION INT NOT NULL, IMMATRICULATION INT NOT NULL, ID INT NOT NULL, DATELOCATION DATE DEFAULT NULL, MONTANTREGLE INT DEFAULT NULL, DATEHREDEPARTPREVU DATETIME DEFAULT NULL, DATEHREDEPARTREEL DATETIME DEFAULT NULL, DATEHRERETOURPREVU DATETIME DEFAULT NULL, DATEHRERETOURREEL DATETIME DEFAULT NULL, INDEX I_FK_LOCATION_CLIENT (ID), INDEX I_FK_LOCATION_VEHICULE (IMMATRICULATION), PRIMARY KEY(NUMLOCATION)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ETRE_PROPOSEE ADD CONSTRAINT FK_ETRE_PROPOSEE_FORMULESANSCHAUFFEUR FOREIGN KEY (ID_1) REFERENCES FORMULESANSCHAUFFEUR (ID)');
        $this->addSql('ALTER TABLE ETRE_PROPOSEE ADD CONSTRAINT FK_ETRE_PROPOSEE_MODELE FOREIGN KEY (ID) REFERENCES MODELE (ID)');
        $this->addSql('ALTER TABLE VEHICULE ADD CONSTRAINT FK_VEHICULE_MODELE FOREIGN KEY (ID) REFERENCES MODELE (ID)');
        $this->addSql('ALTER TABLE FORMULEAVECCHAUFFEUR ADD CONSTRAINT FK_FORMULEAVECCHAUFFEUR_FORMULE FOREIGN KEY (ID) REFERENCES FORMULE (ID)');
        $this->addSql('ALTER TABLE FORMULESANSCHAUFFEUR ADD CONSTRAINT FK_FORMULESANSCHAUFFEUR_FORMULE FOREIGN KEY (ID) REFERENCES FORMULE (ID)');
        $this->addSql('ALTER TABLE LOCATIONAVECCHAUFFEUR ADD CONSTRAINT FK_LOCATIONAVECCHAUFFEUR_LOCATION FOREIGN KEY (NUMLOCATION) REFERENCES LOCATION (NUMLOCATION)');
        $this->addSql('ALTER TABLE LOCATIONAVECCHAUFFEUR ADD CONSTRAINT FK_LOCATIONAVECCHAUFFEUR_FORMULEAVECCHAUFFEUR FOREIGN KEY (ID) REFERENCES FORMULEAVECCHAUFFEUR (ID)');
        $this->addSql('ALTER TABLE LOCATIONSANSCHAUFFEUR ADD CONSTRAINT FK_LOCATIONSANSCHAUFFEUR_FORMULESANSCHAUFFEUR FOREIGN KEY (ID) REFERENCES FORMULESANSCHAUFFEUR (ID)');
        $this->addSql('ALTER TABLE LOCATIONSANSCHAUFFEUR ADD CONSTRAINT FK_LOCATIONSANSCHAUFFEUR_LOCATION FOREIGN KEY (NUMLOCATION) REFERENCES LOCATION (NUMLOCATION)');
        $this->addSql('ALTER TABLE LOCATION ADD CONSTRAINT FK_LOCATION_CLIENT FOREIGN KEY (ID) REFERENCES CLIENT (ID)');
        $this->addSql('ALTER TABLE LOCATION ADD CONSTRAINT FK_LOCATION_VEHICULE FOREIGN KEY (IMMATRICULATION) REFERENCES VEHICULE (IMMATRICULATION)');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE CLIENT CHANGE id ID INT NOT NULL, CHANGE ROLES ROLES LONGTEXT NOT NULL, CHANGE nom NOM CHAR(32) DEFAULT NULL, CHANGE prenom PRENOM CHAR(32) DEFAULT NULL, CHANGE email EMAIL CHAR(50) DEFAULT NULL, CHANGE tel TEL CHAR(10) DEFAULT NULL, CHANGE adresse ADRESSE CHAR(50) DEFAULT NULL, CHANGE cp CP CHAR(5) DEFAULT NULL, CHANGE ville VILLE CHAR(32) DEFAULT NULL, CHANGE mdp MDP CHAR(64) DEFAULT NULL');
        $this->addSql('ALTER TABLE MODELE CHANGE id ID INT NOT NULL, CHANGE nom NOM CHAR(32) DEFAULT NULL, CHANGE tarifkmsupplementaire TARIFKMSUPPLEMENTAIRE INT DEFAULT NULL, CHANGE nbplaces NBPLACES INT DEFAULT NULL, CHANGE vitessemax VITESSEMAX INT DEFAULT NULL, CHANGE description DESCRIPTION CHAR(255) DEFAULT NULL');
    }
}
