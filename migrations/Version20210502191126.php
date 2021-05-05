<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210502191126 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE circular (id INT AUTO_INCREMENT NOT NULL, schoolclass_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, classschool VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_62D1F84CC67D8F5 (schoolclass_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE class_school (id INT AUTO_INCREMENT NOT NULL, scolaryear VARCHAR(120) NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, student_id INT DEFAULT NULL, circular_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_CFBDFA14CB944F1A (student_id), INDEX IDX_CFBDFA1432703801 (circular_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schedule (id INT AUTO_INCREMENT NOT NULL, classschool_id INT DEFAULT NULL, date DATETIME NOT NULL, UNIQUE INDEX UNIQ_5A3811FB5924C9DE (classschool_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, classschool_id INT DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, firstname VARCHAR(255) DEFAULT NULL, adress VARCHAR(255) NOT NULL, birthday DATETIME NOT NULL, numberid INT NOT NULL, matriculel VARCHAR(255) NOT NULL, contactparent VARCHAR(255) NOT NULL, INDEX IDX_B723AF335924C9DE (classschool_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE circular ADD CONSTRAINT FK_62D1F84CC67D8F5 FOREIGN KEY (schoolclass_id) REFERENCES class_school (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14CB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA1432703801 FOREIGN KEY (circular_id) REFERENCES circular (id)');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB5924C9DE FOREIGN KEY (classschool_id) REFERENCES class_school (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF335924C9DE FOREIGN KEY (classschool_id) REFERENCES class_school (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA1432703801');
        $this->addSql('ALTER TABLE circular DROP FOREIGN KEY FK_62D1F84CC67D8F5');
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FB5924C9DE');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF335924C9DE');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14CB944F1A');
        $this->addSql('DROP TABLE circular');
        $this->addSql('DROP TABLE class_school');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE schedule');
        $this->addSql('DROP TABLE student');
    }
}
