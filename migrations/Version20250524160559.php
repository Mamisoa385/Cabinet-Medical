<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250524160559 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Création de la table Ordonnance et Prescription';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE ordonnance (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, medecin_id INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_924B326C6B899279 (patient_id), INDEX IDX_924B326C4F31A84 (medecin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE prescription (id INT AUTO_INCREMENT NOT NULL, ordonnance_id INT NOT NULL, medicament_id INT NOT NULL, quantite INT NOT NULL, INDEX IDX_1FBFB8D92BF23B8F (ordonnance_id), INDEX IDX_1FBFB8D9AB0D61F7 (medicament_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ordonnance ADD CONSTRAINT FK_924B326C6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ordonnance ADD CONSTRAINT FK_924B326C4F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE prescription ADD CONSTRAINT FK_1FBFB8D92BF23B8F FOREIGN KEY (ordonnance_id) REFERENCES ordonnance (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE prescription ADD CONSTRAINT FK_1FBFB8D9AB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE ordonnance DROP FOREIGN KEY FK_924B326C6B899279
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ordonnance DROP FOREIGN KEY FK_924B326C4F31A84
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE prescription DROP FOREIGN KEY FK_1FBFB8D92BF23B8F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE prescription DROP FOREIGN KEY FK_1FBFB8D9AB0D61F7
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE ordonnance
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE prescription
        SQL);
    }
}
