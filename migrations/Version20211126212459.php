<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211126212459 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, illustration_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_1DD399505926566C (illustration_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD399505926566C FOREIGN KEY (illustration_id) REFERENCES illustration (id)');
        $this->addSql('ALTER TABLE illustration DROP decription');
        $this->addSql('ALTER TABLE studio ADD main_picture_id INT DEFAULT NULL, ADD inside_picture_id INT DEFAULT NULL, ADD back_illustration_id INT DEFAULT NULL, DROP image_front, DROP image_inside, DROP image_back');
        $this->addSql('ALTER TABLE studio ADD CONSTRAINT FK_4A2B07B6D6BDC9DC FOREIGN KEY (main_picture_id) REFERENCES illustration (id)');
        $this->addSql('ALTER TABLE studio ADD CONSTRAINT FK_4A2B07B66FE7CE05 FOREIGN KEY (inside_picture_id) REFERENCES illustration (id)');
        $this->addSql('ALTER TABLE studio ADD CONSTRAINT FK_4A2B07B65515AB8B FOREIGN KEY (back_illustration_id) REFERENCES illustration (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A2B07B6D6BDC9DC ON studio (main_picture_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A2B07B66FE7CE05 ON studio (inside_picture_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A2B07B65515AB8B ON studio (back_illustration_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE news');
        $this->addSql('ALTER TABLE illustration ADD decription VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE studio DROP FOREIGN KEY FK_4A2B07B6D6BDC9DC');
        $this->addSql('ALTER TABLE studio DROP FOREIGN KEY FK_4A2B07B66FE7CE05');
        $this->addSql('ALTER TABLE studio DROP FOREIGN KEY FK_4A2B07B65515AB8B');
        $this->addSql('DROP INDEX UNIQ_4A2B07B6D6BDC9DC ON studio');
        $this->addSql('DROP INDEX UNIQ_4A2B07B66FE7CE05 ON studio');
        $this->addSql('DROP INDEX UNIQ_4A2B07B65515AB8B ON studio');
        $this->addSql('ALTER TABLE studio ADD image_front VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD image_inside VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD image_back VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP main_picture_id, DROP inside_picture_id, DROP back_illustration_id');
    }
}
