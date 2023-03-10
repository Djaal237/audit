<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308110423 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_93872075953C1C61');
        $this->addSql('DROP INDEX IDX_93872075953C1C61 ON tache');
        $this->addSql('ALTER TABLE tache CHANGE source_id incident_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_9387207559E53FB9 FOREIGN KEY (incident_id) REFERENCES incident (id)');
        $this->addSql('CREATE INDEX IDX_9387207559E53FB9 ON tache (incident_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_9387207559E53FB9');
        $this->addSql('DROP INDEX IDX_9387207559E53FB9 ON tache');
        $this->addSql('ALTER TABLE tache CHANGE incident_id source_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_93872075953C1C61 FOREIGN KEY (source_id) REFERENCES incident (id)');
        $this->addSql('CREATE INDEX IDX_93872075953C1C61 ON tache (source_id)');
    }
}
