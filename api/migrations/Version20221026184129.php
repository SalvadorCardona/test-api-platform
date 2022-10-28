<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221026184129 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE greeting ADD test_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE greeting ADD CONSTRAINT FK_46E3A4AB1E5D0459 FOREIGN KEY (test_id) REFERENCES test (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_46E3A4AB1E5D0459 ON greeting (test_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE greeting DROP CONSTRAINT FK_46E3A4AB1E5D0459');
        $this->addSql('DROP INDEX IDX_46E3A4AB1E5D0459');
        $this->addSql('ALTER TABLE greeting DROP test_id');
    }
}
