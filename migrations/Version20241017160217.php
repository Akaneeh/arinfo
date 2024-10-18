<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241017160217 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classes DROP FOREIGN KEY FK_2ED7EC5BAB22EE9');
        $this->addSql('DROP INDEX IDX_2ED7EC5BAB22EE9 ON classes');
        $this->addSql('ALTER TABLE classes DROP professeur_id, CHANGE nom_classe nom_classe VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classes ADD professeur_id INT NOT NULL, CHANGE nom_classe nom_classe LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT FK_2ED7EC5BAB22EE9 FOREIGN KEY (professeur_id) REFERENCES professeur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_2ED7EC5BAB22EE9 ON classes (professeur_id)');
    }
}
