<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241018101307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE licencie ADD club_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B755612DF2AB4E5 FOREIGN KEY (club_id_id) REFERENCES club (id)');
        $this->addSql('CREATE INDEX IDX_3B755612DF2AB4E5 ON licencie (club_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B755612DF2AB4E5');
        $this->addSql('DROP INDEX IDX_3B755612DF2AB4E5 ON licencie');
        $this->addSql('ALTER TABLE licencie DROP club_id_id');
    }
}
