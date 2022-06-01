<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220601093242 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personne ADD discr VARCHAR(255) NOT NULL, DROP matricule, DROP professeur_id, DROP login, DROP password, DROP demande_id, DROP classe_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personne ADD matricule VARCHAR(255) DEFAULT NULL, ADD professeur_id INT DEFAULT NULL, ADD login VARCHAR(255) DEFAULT NULL, ADD password VARCHAR(255) DEFAULT NULL, ADD demande_id INT DEFAULT NULL, ADD classe_id INT DEFAULT NULL, DROP discr');
    }
}
