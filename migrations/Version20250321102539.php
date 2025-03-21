<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250321102539 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation_treatment DROP FOREIGN KEY FK_3EF32AD662FF6CDF');
        $this->addSql('ALTER TABLE consultation_treatment DROP FOREIGN KEY FK_3EF32AD6471C0366');
        $this->addSql('DROP TABLE consultation_treatment');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE consultation_treatment (consultation_id INT NOT NULL, treatment_id INT NOT NULL, INDEX IDX_3EF32AD6471C0366 (treatment_id), INDEX IDX_3EF32AD662FF6CDF (consultation_id), PRIMARY KEY(consultation_id, treatment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE consultation_treatment ADD CONSTRAINT FK_3EF32AD662FF6CDF FOREIGN KEY (consultation_id) REFERENCES consultation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE consultation_treatment ADD CONSTRAINT FK_3EF32AD6471C0366 FOREIGN KEY (treatment_id) REFERENCES treatment (id) ON DELETE CASCADE');
    }
}
