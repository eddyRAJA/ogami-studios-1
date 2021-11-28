<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211127224154 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipment ADD equip_main_picture VARCHAR(255) NOT NULL, ADD equip_secondpicture VARCHAR(255) DEFAULT NULL, ADD equip_third_picture VARCHAR(255) DEFAULT NULL, CHANGE category_id category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE illustration DROP FOREIGN KEY FK_D67B9A42517FE9FE');
        $this->addSql('DROP INDEX IDX_D67B9A42517FE9FE ON illustration');
        $this->addSql('ALTER TABLE illustration DROP equipment_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipment DROP equip_main_picture, DROP equip_secondpicture, DROP equip_third_picture, CHANGE category_id category_id INT NOT NULL');
        $this->addSql('ALTER TABLE illustration ADD equipment_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE illustration ADD CONSTRAINT FK_D67B9A42517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D67B9A42517FE9FE ON illustration (equipment_id)');
    }
}
