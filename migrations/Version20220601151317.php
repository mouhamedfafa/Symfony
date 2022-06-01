<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220601151317 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D65DAC5993');
        $this->addSql('DROP INDEX IDX_5E90F6D65DAC5993 ON inscription');
        $this->addSql('ALTER TABLE inscription CHANGE inscription_id classe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D68F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D68F5EA509 ON inscription (classe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D68F5EA509');
        $this->addSql('DROP INDEX IDX_5E90F6D68F5EA509 ON inscription');
        $this->addSql('ALTER TABLE inscription CHANGE classe_id inscription_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D65DAC5993 FOREIGN KEY (inscription_id) REFERENCES classe (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D65DAC5993 ON inscription (inscription_id)');
    }
}
