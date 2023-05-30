<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230530165725 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, subject VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE films ADD realisation VARCHAR(400) NOT NULL, ADD scenario VARCHAR(400) NOT NULL, ADD annee INT DEFAULT NULL, ADD duree INT DEFAULT NULL, ADD regie VARCHAR(400) DEFAULT NULL, ADD decors VARCHAR(400) DEFAULT NULL, DROP réalisation, DROP scénario, DROP année, DROP durée, DROP régie, DROP décors, CHANGE sélections selections LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE contact');
        $this->addSql('ALTER TABLE films ADD réalisation VARCHAR(400) NOT NULL, ADD scénario VARCHAR(400) NOT NULL, ADD année INT DEFAULT NULL, ADD durée INT DEFAULT NULL, ADD régie VARCHAR(400) DEFAULT NULL, ADD décors VARCHAR(400) DEFAULT NULL, DROP realisation, DROP scenario, DROP annee, DROP duree, DROP regie, DROP decors, CHANGE selections sélections LONGTEXT DEFAULT NULL');
    }
}
