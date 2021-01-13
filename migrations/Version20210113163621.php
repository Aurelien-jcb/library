<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210113163621 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(190) NOT NULL, category VARCHAR(190) NOT NULL, language VARCHAR(190) NOT NULL, author VARCHAR(190) NOT NULL, date DATE NOT NULL, number_page INT DEFAULT NULL, editor VARCHAR(190) DEFAULT NULL, book_isbn INT NOT NULL, state VARCHAR(190) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE borrow (id INT AUTO_INCREMENT NOT NULL, borrow_date DATE NOT NULL, back_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE borrow_book (borrow_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_48C89914D4C006C8 (borrow_id), INDEX IDX_48C8991416A2B381 (book_id), PRIMARY KEY(borrow_id, book_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE borrower (id INT AUTO_INCREMENT NOT NULL, borrowers_id INT DEFAULT NULL, name VARCHAR(190) NOT NULL, mail VARCHAR(190) NOT NULL, phone INT NOT NULL, login VARCHAR(190) DEFAULT NULL, password VARCHAR(190) DEFAULT NULL, flag TINYINT(1) NOT NULL, card TINYINT(1) NOT NULL, INDEX IDX_DB904DB44BDC8A54 (borrowers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE setting (id INT AUTO_INCREMENT NOT NULL, borrow_duration VARCHAR(190) NOT NULL, number_ofbooks INT NOT NULL, late_penality DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE borrow_book ADD CONSTRAINT FK_48C89914D4C006C8 FOREIGN KEY (borrow_id) REFERENCES borrow (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE borrow_book ADD CONSTRAINT FK_48C8991416A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE borrower ADD CONSTRAINT FK_DB904DB44BDC8A54 FOREIGN KEY (borrowers_id) REFERENCES borrow (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE borrow_book DROP FOREIGN KEY FK_48C8991416A2B381');
        $this->addSql('ALTER TABLE borrow_book DROP FOREIGN KEY FK_48C89914D4C006C8');
        $this->addSql('ALTER TABLE borrower DROP FOREIGN KEY FK_DB904DB44BDC8A54');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE borrow');
        $this->addSql('DROP TABLE borrow_book');
        $this->addSql('DROP TABLE borrower');
        $this->addSql('DROP TABLE setting');
    }
}
