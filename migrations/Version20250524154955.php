<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250524154955 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Création de la table Rendez-vous';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE rendezvous (id INT AUTO_INCREMENT NOT NULL, patient_id INT DEFAULT NULL, medecin_id INT DEFAULT NULL, date_heure DATETIME DEFAULT NULL, motif LONGTEXT DEFAULT NULL, INDEX IDX_C09A9BA86B899279 (patient_id), INDEX IDX_C09A9BA84F31A84 (medecin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rendezvous ADD CONSTRAINT FK_C09A9BA86B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rendezvous ADD CONSTRAINT FK_C09A9BA84F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE rendezvous DROP FOREIGN KEY FK_C09A9BA86B899279
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE rendezvous DROP FOREIGN KEY FK_C09A9BA84F31A84
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE rendezvous
        SQL);
    }
}
