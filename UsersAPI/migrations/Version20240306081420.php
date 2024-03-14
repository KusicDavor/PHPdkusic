<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240306081420 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE token_database DROP FOREIGN KEY FK_BD0CDBADA15303B9');
        $this->addSql('DROP TABLE token_database');
        $this->addSql('ALTER TABLE user DROP token');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE token_database (id INT AUTO_INCREMENT NOT NULL, user_token_id INT NOT NULL, UNIQUE INDEX UNIQ_BD0CDBADA15303B9 (user_token_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE token_database ADD CONSTRAINT FK_BD0CDBADA15303B9 FOREIGN KEY (user_token_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE user ADD token VARCHAR(255) NOT NULL');
    }
}
