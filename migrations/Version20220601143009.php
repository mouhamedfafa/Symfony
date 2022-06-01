<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220601143009 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant ADD classe_id INT DEFAULT NULL, ADD etuclasse_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E38F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3FCE8037D FOREIGN KEY (etuclasse_id) REFERENCES classe (id)');
        $this->addSql('CREATE INDEX IDX_717E22E38F5EA509 ON etudiant (classe_id)');
        $this->addSql('CREATE INDEX IDX_717E22E3FCE8037D ON etudiant (etuclasse_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E38F5EA509');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3FCE8037D');
        $this->addSql('DROP INDEX IDX_717E22E38F5EA509 ON etudiant');
        $this->addSql('DROP INDEX IDX_717E22E3FCE8037D ON etudiant');
        $this->addSql('ALTER TABLE etudiant DROP classe_id, DROP etuclasse_id');
    }
}
