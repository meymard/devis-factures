<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170620203501 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tva ADD libelle VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ligne ADD tva DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE ligne ADD CONSTRAINT FK_57F0DB83EF699620 FOREIGN KEY (tva) REFERENCES tva (tva)');
        $this->addSql('CREATE INDEX IDX_57F0DB83EF699620 ON ligne (tva)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ligne DROP FOREIGN KEY FK_57F0DB83EF699620');
        $this->addSql('DROP INDEX IDX_57F0DB83EF699620 ON ligne');
        $this->addSql('ALTER TABLE ligne DROP tva');
        $this->addSql('ALTER TABLE tva DROP libelle');
    }
}
