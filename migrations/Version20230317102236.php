<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230317102236 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE famous_dishes (id INT AUTO_INCREMENT NOT NULL, home_page_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, image_name VARCHAR(255) NOT NULL, INDEX IDX_DC01CEDB966A8BC (home_page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE home_page (id INT AUTO_INCREMENT NOT NULL, page_title VARCHAR(255) NOT NULL, welcome_text LONGTEXT NOT NULL, about_title VARCHAR(255) NOT NULL, about_text LONGTEXT NOT NULL, section_dishes_title VARCHAR(255) NOT NULL, section_dishes_text LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE famous_dishes ADD CONSTRAINT FK_DC01CEDB966A8BC FOREIGN KEY (home_page_id) REFERENCES home_page (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE famous_dishes DROP FOREIGN KEY FK_DC01CEDB966A8BC');
        $this->addSql('DROP TABLE famous_dishes');
        $this->addSql('DROP TABLE home_page');
    }
}
