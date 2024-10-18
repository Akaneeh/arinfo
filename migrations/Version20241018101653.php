<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241018101653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE licencie ADD equipe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B7556126D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('CREATE INDEX IDX_3B7556126D861B89 ON licencie (equipe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B7556126D861B89');
        $this->addSql('DROP INDEX IDX_3B7556126D861B89 ON licencie');
        $this->addSql('ALTER TABLE licencie DROP equipe_id');
    }
}
