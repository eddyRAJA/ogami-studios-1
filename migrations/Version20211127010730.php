<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211127010730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE illustration DROP FOREIGN KEY FK_D67B9A42446F285F');
        $this->addSql('DROP INDEX IDX_D67B9A42446F285F ON illustration');
        $this->addSql('ALTER TABLE illustration DROP studio_id');
        $this->addSql('ALTER TABLE studio ADD illustration VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE illustration ADD studio_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE illustration ADD CONSTRAINT FK_D67B9A42446F285F FOREIGN KEY (studio_id) REFERENCES studio (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D67B9A42446F285F ON illustration (studio_id)');
        $this->addSql('ALTER TABLE studio DROP illustration');
    }
}
