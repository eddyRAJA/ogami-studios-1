<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211124144236 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE studio ADD picture_id INT NOT NULL, DROP image_front, DROP image_inside, DROP image_back');
        $this->addSql('ALTER TABLE studio ADD CONSTRAINT FK_4A2B07B6EE45BDBF FOREIGN KEY (picture_id) REFERENCES illustration (id)');
        $this->addSql('CREATE INDEX IDX_4A2B07B6EE45BDBF ON studio (picture_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE studio DROP FOREIGN KEY FK_4A2B07B6EE45BDBF');
        $this->addSql('DROP INDEX IDX_4A2B07B6EE45BDBF ON studio');
        $this->addSql('ALTER TABLE studio ADD image_front VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD image_inside VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD image_back VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP picture_id');
    }
}
