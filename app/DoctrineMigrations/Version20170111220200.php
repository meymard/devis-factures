<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170111220200 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ligne (id INT NOT NULL, facture_id INT DEFAULT NULL, description LONGTEXT NOT NULL, quantite DOUBLE PRECISION NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_57F0DB837F2DEE08 (facture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT NOT NULL, num VARCHAR(5) NOT NULL, date VARCHAR(10) NOT NULL, tva DOUBLE PRECISION NOT NULL, accompte INT NOT NULL, acompte_val DOUBLE PRECISION NOT NULL, reference VARCHAR(40) NOT NULL, nom VARCHAR(80) NOT NULL, adresse VARCHAR(255) NOT NULL, adresse2 VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(5) NOT NULL, ville VARCHAR(30) NOT NULL, telephone VARCHAR(50) DEFAULT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ligne ADD CONSTRAINT FK_57F0DB837F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ligne DROP FOREIGN KEY FK_57F0DB837F2DEE08');
        $this->addSql('DROP TABLE ligne');
        $this->addSql('DROP TABLE facture');
    }
}
