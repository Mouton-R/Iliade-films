<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230419161345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, INDEX IDX_3AF34668727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE films (id INT AUTO_INCREMENT NOT NULL, categories_id INT NOT NULL, titre VARCHAR(400) NOT NULL, réalisation VARCHAR(400) NOT NULL, scénario VARCHAR(400) NOT NULL, année INT DEFAULT NULL, durée INT DEFAULT NULL, synopsis LONGTEXT DEFAULT NULL, coproduction VARCHAR(400) DEFAULT NULL, soutiens LONGTEXT DEFAULT NULL, distribution VARCHAR(255) DEFAULT NULL, diffusion VARCHAR(255) DEFAULT NULL, sélections LONGTEXT DEFAULT NULL, avec LONGTEXT DEFAULT NULL, image VARCHAR(400) DEFAULT NULL, son VARCHAR(400) DEFAULT NULL, montage VARCHAR(400) DEFAULT NULL, musique VARCHAR(400) DEFAULT NULL, direction VARCHAR(400) DEFAULT NULL, régie VARCHAR(400) DEFAULT NULL, décors VARCHAR(400) DEFAULT NULL, costumes VARCHAR(400) DEFAULT NULL, etalonnage VARCHAR(400) DEFAULT NULL, INDEX IDX_CEECCA51A21214B7 (categories_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, films_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_E01FBE6A939610EE (films_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF34668727ACA70 FOREIGN KEY (parent_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE films ADD CONSTRAINT FK_CEECCA51A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A939610EE FOREIGN KEY (films_id) REFERENCES films (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF34668727ACA70');
        $this->addSql('ALTER TABLE films DROP FOREIGN KEY FK_CEECCA51A21214B7');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A939610EE');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE films');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
