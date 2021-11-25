<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211125111414 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE studio DROP FOREIGN KEY FK_4A2B07B6EE45BDBF');
        $this->addSql('DROP INDEX IDX_4A2B07B6EE45BDBF ON studio');
        $this->addSql('ALTER TABLE studio DROP picture_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE studio ADD picture_id INT NOT NULL');
        $this->addSql('ALTER TABLE studio ADD CONSTRAINT FK_4A2B07B6EE45BDBF FOREIGN KEY (picture_id) REFERENCES illustration (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_4A2B07B6EE45BDBF ON studio (picture_id)');
    }
}
