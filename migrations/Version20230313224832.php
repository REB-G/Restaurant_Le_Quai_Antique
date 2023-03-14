<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230313224832 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE allergies (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dishes (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, image_name VARCHAR(255) NOT NULL, INDEX IDX_584DD35D12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menus (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menus_dishes (menus_id INT NOT NULL, dishes_id INT NOT NULL, INDEX IDX_877C5E7914041B84 (menus_id), INDEX IDX_877C5E79A05DD37A (dishes_id), PRIMARY KEY(menus_id, dishes_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opening_days (id INT AUTO_INCREMENT NOT NULL, day VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opening_days_services (opening_days_id INT NOT NULL, services_id INT NOT NULL, INDEX IDX_F77D5B6311F5419 (opening_days_id), INDEX IDX_F77D5B63AEF5A6C1 (services_id), PRIMARY KEY(opening_days_id, services_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, user_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', reservation_hour_id INT DEFAULT NULL, service_id INT DEFAULT NULL, reservation_date DATETIME NOT NULL, number_of_guests INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, INDEX IDX_42C84955A76ED395 (user_id), INDEX IDX_42C84955D206C07C (reservation_hour_id), INDEX IDX_42C84955ED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_allergies (reservation_id INT NOT NULL, allergies_id INT NOT NULL, INDEX IDX_975EDE84B83297E7 (reservation_id), INDEX IDX_975EDE847104939B (allergies_id), PRIMARY KEY(reservation_id, allergies_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_time (id INT AUTO_INCREMENT NOT NULL, service_id INT NOT NULL, hour VARCHAR(255) NOT NULL, INDEX IDX_79AD552DED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, nbr_total_of_places INT NOT NULL, opening_days VARCHAR(255) NOT NULL, opening_hours VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, default_number_of_guests INT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_allergies (users_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', allergies_id INT NOT NULL, INDEX IDX_EB64C5FA67B3B43D (users_id), INDEX IDX_EB64C5FA7104939B (allergies_id), PRIMARY KEY(users_id, allergies_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dishes ADD CONSTRAINT FK_584DD35D12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE menus_dishes ADD CONSTRAINT FK_877C5E7914041B84 FOREIGN KEY (menus_id) REFERENCES menus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menus_dishes ADD CONSTRAINT FK_877C5E79A05DD37A FOREIGN KEY (dishes_id) REFERENCES dishes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE opening_days_services ADD CONSTRAINT FK_F77D5B6311F5419 FOREIGN KEY (opening_days_id) REFERENCES opening_days (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE opening_days_services ADD CONSTRAINT FK_F77D5B63AEF5A6C1 FOREIGN KEY (services_id) REFERENCES services (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955D206C07C FOREIGN KEY (reservation_hour_id) REFERENCES reservation_time (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955ED5CA9E6 FOREIGN KEY (service_id) REFERENCES services (id)');
        $this->addSql('ALTER TABLE reservation_allergies ADD CONSTRAINT FK_975EDE84B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_allergies ADD CONSTRAINT FK_975EDE847104939B FOREIGN KEY (allergies_id) REFERENCES allergies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_time ADD CONSTRAINT FK_79AD552DED5CA9E6 FOREIGN KEY (service_id) REFERENCES services (id)');
        $this->addSql('ALTER TABLE users_allergies ADD CONSTRAINT FK_EB64C5FA67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_allergies ADD CONSTRAINT FK_EB64C5FA7104939B FOREIGN KEY (allergies_id) REFERENCES allergies (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dishes DROP FOREIGN KEY FK_584DD35D12469DE2');
        $this->addSql('ALTER TABLE menus_dishes DROP FOREIGN KEY FK_877C5E7914041B84');
        $this->addSql('ALTER TABLE menus_dishes DROP FOREIGN KEY FK_877C5E79A05DD37A');
        $this->addSql('ALTER TABLE opening_days_services DROP FOREIGN KEY FK_F77D5B6311F5419');
        $this->addSql('ALTER TABLE opening_days_services DROP FOREIGN KEY FK_F77D5B63AEF5A6C1');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A76ED395');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955D206C07C');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955ED5CA9E6');
        $this->addSql('ALTER TABLE reservation_allergies DROP FOREIGN KEY FK_975EDE84B83297E7');
        $this->addSql('ALTER TABLE reservation_allergies DROP FOREIGN KEY FK_975EDE847104939B');
        $this->addSql('ALTER TABLE reservation_time DROP FOREIGN KEY FK_79AD552DED5CA9E6');
        $this->addSql('ALTER TABLE users_allergies DROP FOREIGN KEY FK_EB64C5FA67B3B43D');
        $this->addSql('ALTER TABLE users_allergies DROP FOREIGN KEY FK_EB64C5FA7104939B');
        $this->addSql('DROP TABLE allergies');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE dishes');
        $this->addSql('DROP TABLE menus');
        $this->addSql('DROP TABLE menus_dishes');
        $this->addSql('DROP TABLE opening_days');
        $this->addSql('DROP TABLE opening_days_services');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE reservation_allergies');
        $this->addSql('DROP TABLE reservation_time');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('DROP TABLE services');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE users_allergies');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
