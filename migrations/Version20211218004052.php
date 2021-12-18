<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211218004052 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reserver (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reserver_user (reserver_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_8B9821044A67F3 (reserver_id), INDEX IDX_8B98210A76ED395 (user_id), PRIMARY KEY(reserver_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reserver_user ADD CONSTRAINT FK_8B9821044A67F3 FOREIGN KEY (reserver_id) REFERENCES reserver (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reserver_user ADD CONSTRAINT FK_8B98210A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reserver_user DROP FOREIGN KEY FK_8B9821044A67F3');
        $this->addSql('DROP TABLE reserver');
        $this->addSql('DROP TABLE reserver_user');
    }
}
