<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230306163401 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE affectation (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, tache_id INT NOT NULL, INDEX IDX_F4DD61D3FB88E14F (utilisateur_id), INDEX IDX_F4DD61D3D2235D39 (tache_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE incident (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, date_heure_constat DATE NOT NULL, date_heure_document DATE NOT NULL, INDEX IDX_3D03A11ABCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, message VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE signalisation (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, incident_id INT DEFAULT NULL, INDEX IDX_1BD243CDFB88E14F (utilisateur_id), INDEX IDX_1BD243CD59E53FB9 (incident_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tache (id INT AUTO_INCREMENT NOT NULL, source_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, echeance1 DATE NOT NULL, echeance2 DATE NOT NULL, date_realisation DATE NOT NULL, solde TINYINT(1) NOT NULL, efficace TINYINT(1) NOT NULL, commentaire VARCHAR(255) NOT NULL, INDEX IDX_93872075953C1C61 (source_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT FK_F4DD61D3FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT FK_F4DD61D3D2235D39 FOREIGN KEY (tache_id) REFERENCES tache (id)');
        $this->addSql('ALTER TABLE incident ADD CONSTRAINT FK_3D03A11ABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE signalisation ADD CONSTRAINT FK_1BD243CDFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE signalisation ADD CONSTRAINT FK_1BD243CD59E53FB9 FOREIGN KEY (incident_id) REFERENCES incident (id)');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_93872075953C1C61 FOREIGN KEY (source_id) REFERENCES incident (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE affectation DROP FOREIGN KEY FK_F4DD61D3FB88E14F');
        $this->addSql('ALTER TABLE affectation DROP FOREIGN KEY FK_F4DD61D3D2235D39');
        $this->addSql('ALTER TABLE incident DROP FOREIGN KEY FK_3D03A11ABCF5E72D');
        $this->addSql('ALTER TABLE signalisation DROP FOREIGN KEY FK_1BD243CDFB88E14F');
        $this->addSql('ALTER TABLE signalisation DROP FOREIGN KEY FK_1BD243CD59E53FB9');
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_93872075953C1C61');
        $this->addSql('DROP TABLE affectation');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE incident');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE signalisation');
        $this->addSql('DROP TABLE tache');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
