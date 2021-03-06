<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191109150801 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE city_borders');
        $this->addSql('ALTER TABLE city ADD iop_longitude DOUBLE PRECISION NOT NULL, ADD bottom_longitude DOUBLE PRECISION NOT NULL, ADD left_latitude DOUBLE PRECISION NOT NULL, ADD right_latitude DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE city_borders (id INT AUTO_INCREMENT NOT NULL, city_id INT DEFAULT NULL, iop_longitude DOUBLE PRECISION NOT NULL, bottom_longitude DOUBLE PRECISION NOT NULL, left_latitude DOUBLE PRECISION NOT NULL, right_latitude DOUBLE PRECISION NOT NULL, INDEX IDX_68E060AD8BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE city_borders ADD CONSTRAINT FK_68E060AD8BAC62AF FOREIGN KEY (city_id) REFERENCES city (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE city DROP iop_longitude, DROP bottom_longitude, DROP left_latitude, DROP right_latitude');
    }
}
