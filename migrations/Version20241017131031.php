<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241017131031 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classes ADD professeur_id INT NOT NULL');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT FK_2ED7EC5BAB22EE9 FOREIGN KEY (professeur_id) REFERENCES professeur (id)');
        $this->addSql('CREATE INDEX IDX_2ED7EC5BAB22EE9 ON classes (professeur_id)');
        $this->addSql('ALTER TABLE eleves ADD classe_id INT NOT NULL');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B18F5EA509 FOREIGN KEY (classe_id) REFERENCES classes (id)');
        $this->addSql('CREATE INDEX IDX_383B09B18F5EA509 ON eleves (classe_id)');
        $this->addSql('ALTER TABLE professeur CHANGE nom_professeur nom_professeur VARCHAR(255) DEFAULT NULL, CHANGE prenom_professeur prenom_professeur VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classes DROP FOREIGN KEY FK_2ED7EC5BAB22EE9');
        $this->addSql('DROP INDEX IDX_2ED7EC5BAB22EE9 ON classes');
        $this->addSql('ALTER TABLE classes DROP professeur_id');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B18F5EA509');
        $this->addSql('DROP INDEX IDX_383B09B18F5EA509 ON eleves');
        $this->addSql('ALTER TABLE eleves DROP classe_id');
        $this->addSql('ALTER TABLE professeur CHANGE nom_professeur nom_professeur VARCHAR(255) NOT NULL, CHANGE prenom_professeur prenom_professeur VARCHAR(255) NOT NULL');
    }
}
