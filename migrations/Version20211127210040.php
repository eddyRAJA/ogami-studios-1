<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211127210040 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_D338D58312469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D58312469DE2 FOREIGN KEY (category_id) REFERENCES equipment_category (id)');
        $this->addSql('ALTER TABLE illustration ADD equipment_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE illustration ADD CONSTRAINT FK_D67B9A42517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id)');
        $this->addSql('CREATE INDEX IDX_D67B9A42517FE9FE ON illustration (equipment_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE illustration DROP FOREIGN KEY FK_D67B9A42517FE9FE');
        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D58312469DE2');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE equipment_category');
        $this->addSql('DROP INDEX IDX_D67B9A42517FE9FE ON illustration');
        $this->addSql('ALTER TABLE illustration DROP equipment_id');
    }
}
