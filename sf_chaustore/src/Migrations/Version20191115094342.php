<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191115094342 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock (id INT AUTO_INCREMENT NOT NULL, stock INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock_product (stock_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_CAEC140EDCD6110 (stock_id), INDEX IDX_CAEC140E4584665A (product_id), PRIMARY KEY(stock_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock_size (stock_id INT NOT NULL, size_id INT NOT NULL, INDEX IDX_EEDA7CAEDCD6110 (stock_id), INDEX IDX_EEDA7CAE498DA827 (size_id), PRIMARY KEY(stock_id, size_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE size (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, brand_id INT NOT NULL, color_id INT NOT NULL, name VARCHAR(255) NOT NULL, price NUMERIC(5, 2) NOT NULL, gender VARCHAR(1) NOT NULL, INDEX IDX_D34A04AD12469DE2 (category_id), INDEX IDX_D34A04AD44F5D008 (brand_id), INDEX IDX_D34A04AD7ADA1FB5 (color_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stock_product ADD CONSTRAINT FK_CAEC140EDCD6110 FOREIGN KEY (stock_id) REFERENCES stock (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stock_product ADD CONSTRAINT FK_CAEC140E4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stock_size ADD CONSTRAINT FK_EEDA7CAEDCD6110 FOREIGN KEY (stock_id) REFERENCES stock (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stock_size ADD CONSTRAINT FK_EEDA7CAE498DA827 FOREIGN KEY (size_id) REFERENCES size (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('ALTER TABLE stock_product DROP FOREIGN KEY FK_CAEC140EDCD6110');
        $this->addSql('ALTER TABLE stock_size DROP FOREIGN KEY FK_EEDA7CAEDCD6110');
        $this->addSql('ALTER TABLE stock_size DROP FOREIGN KEY FK_EEDA7CAE498DA827');
        $this->addSql('ALTER TABLE stock_product DROP FOREIGN KEY FK_CAEC140E4584665A');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD7ADA1FB5');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD44F5D008');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE stock');
        $this->addSql('DROP TABLE stock_product');
        $this->addSql('DROP TABLE stock_size');
        $this->addSql('DROP TABLE size');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE brand');
    }
}
