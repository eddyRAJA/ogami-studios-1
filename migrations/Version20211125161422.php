<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211125161422 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, main_picture_id INT DEFAULT NULL, second_picture_id INT DEFAULT NULL, gallery_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_D338D583D6BDC9DC (main_picture_id), UNIQUE INDEX UNIQ_D338D583D1B5D2C (second_picture_id), UNIQUE INDEX UNIQ_D338D5834E7AF8F (gallery_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583D6BDC9DC FOREIGN KEY (main_picture_id) REFERENCES illustration (id)');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583D1B5D2C FOREIGN KEY (second_picture_id) REFERENCES illustration (id)');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D5834E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE equipment');
    }
}
