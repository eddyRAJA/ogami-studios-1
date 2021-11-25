<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211125154034 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE studio ADD main_picture_id INT DEFAULT NULL, ADD inside_picture_id INT DEFAULT NULL, ADD back_illustration_id INT DEFAULT NULL, ADD gallery_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE studio ADD CONSTRAINT FK_4A2B07B6D6BDC9DC FOREIGN KEY (main_picture_id) REFERENCES illustration (id)');
        $this->addSql('ALTER TABLE studio ADD CONSTRAINT FK_4A2B07B66FE7CE05 FOREIGN KEY (inside_picture_id) REFERENCES illustration (id)');
        $this->addSql('ALTER TABLE studio ADD CONSTRAINT FK_4A2B07B65515AB8B FOREIGN KEY (back_illustration_id) REFERENCES illustration (id)');
        $this->addSql('ALTER TABLE studio ADD CONSTRAINT FK_4A2B07B64E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A2B07B6D6BDC9DC ON studio (main_picture_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A2B07B66FE7CE05 ON studio (inside_picture_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A2B07B65515AB8B ON studio (back_illustration_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A2B07B64E7AF8F ON studio (gallery_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE studio DROP FOREIGN KEY FK_4A2B07B6D6BDC9DC');
        $this->addSql('ALTER TABLE studio DROP FOREIGN KEY FK_4A2B07B66FE7CE05');
        $this->addSql('ALTER TABLE studio DROP FOREIGN KEY FK_4A2B07B65515AB8B');
        $this->addSql('ALTER TABLE studio DROP FOREIGN KEY FK_4A2B07B64E7AF8F');
        $this->addSql('DROP INDEX UNIQ_4A2B07B6D6BDC9DC ON studio');
        $this->addSql('DROP INDEX UNIQ_4A2B07B66FE7CE05 ON studio');
        $this->addSql('DROP INDEX UNIQ_4A2B07B65515AB8B ON studio');
        $this->addSql('DROP INDEX UNIQ_4A2B07B64E7AF8F ON studio');
        $this->addSql('ALTER TABLE studio DROP main_picture_id, DROP inside_picture_id, DROP back_illustration_id, DROP gallery_id');
    }
}
