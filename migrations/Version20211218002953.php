<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211218002953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vol (id INT AUTO_INCREMENT NOT NULL, date_depart DATETIME NOT NULL, date_arrivee DATETIME NOT NULL, nb_classe_a INT NOT NULL, nb_classe_b INT NOT NULL, prix_class_a DOUBLE PRECISION NOT NULL, prix_class_b DOUBLE PRECISION NOT NULL, v_depart VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD is_verified TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE vol');
        $this->addSql('ALTER TABLE user DROP is_verified');
    }
}
