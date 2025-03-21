<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250321102815 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation ADD veterinarian_id INT DEFAULT NULL, DROP statut');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A6804C8213 FOREIGN KEY (veterinarian_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_964685A6804C8213 ON consultation (veterinarian_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A6804C8213');
        $this->addSql('DROP INDEX IDX_964685A6804C8213 ON consultation');
        $this->addSql('ALTER TABLE consultation ADD statut VARCHAR(255) NOT NULL, DROP veterinarian_id');
    }
}
