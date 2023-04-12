<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230329141535 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, id_client_id INT NOT NULL, nomination_adresse VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, cp VARCHAR(5) NOT NULL, actif TINYINT(1) NOT NULL, INDEX IDX_C35F081699DED506 (id_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, nomination VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_497DD634727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, id_coeff_id INT NOT NULL, id_commercial_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(10) DEFAULT NULL, created_at DATETIME DEFAULT \'CURRENT_TIMESTANP\' NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', raison_sociale VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_C7440455E7927C74 (email), INDEX IDX_C7440455DF650051 (id_coeff_id), INDEX IDX_C7440455C67CD679 (id_commercial_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coefficient (id INT AUTO_INCREMENT NOT NULL, nomination VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', reduction INT DEFAULT NULL, total_ttc NUMERIC(8, 2) NOT NULL, statut VARCHAR(255) NOT NULL, INDEX IDX_6EEAA67D19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commercial (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, specialisation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, ref_produit_id INT NOT NULL, src LONGTEXT NOT NULL, isprimary TINYINT(1) NOT NULL, INDEX IDX_14B784189F191E5 (ref_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, stock_id INT DEFAULT NULL, short_libel VARCHAR(255) NOT NULL, long_libel LONGTEXT DEFAULT NULL, prx_ht NUMERIC(8, 2) DEFAULT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_29A5EC27DCD6110 (stock_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_categorie (produit_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_CDEA88D8F347EFB (produit_id), INDEX IDX_CDEA88D8BCF5E72D (categorie_id), PRIMARY KEY(produit_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock (id INT AUTO_INCREMENT NOT NULL, quantite INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F081699DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634727ACA70 FOREIGN KEY (parent_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455DF650051 FOREIGN KEY (id_coeff_id) REFERENCES coefficient (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455C67CD679 FOREIGN KEY (id_commercial_id) REFERENCES commercial (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784189F191E5 FOREIGN KEY (ref_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27DCD6110 FOREIGN KEY (stock_id) REFERENCES stock (id)');
        $this->addSql('ALTER TABLE produit_categorie ADD CONSTRAINT FK_CDEA88D8F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_categorie ADD CONSTRAINT FK_CDEA88D8BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F081699DED506');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634727ACA70');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455DF650051');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455C67CD679');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D19EB6921');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784189F191E5');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27DCD6110');
        $this->addSql('ALTER TABLE produit_categorie DROP FOREIGN KEY FK_CDEA88D8F347EFB');
        $this->addSql('ALTER TABLE produit_categorie DROP FOREIGN KEY FK_CDEA88D8BCF5E72D');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE coefficient');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE commercial');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE produit_categorie');
        $this->addSql('DROP TABLE stock');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
