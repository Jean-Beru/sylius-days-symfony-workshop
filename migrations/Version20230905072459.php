<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230905072459 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add Product and Color.';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE color (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(6) NOT NULL, reference VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, price INTEGER DEFAULT NULL)');
        $this->addSql('CREATE TABLE product_color (product_id INTEGER NOT NULL, color_id INTEGER NOT NULL, PRIMARY KEY(product_id, color_id), CONSTRAINT FK_C70A33B54584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_C70A33B57ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_C70A33B54584665A ON product_color (product_id)');
        $this->addSql('CREATE INDEX IDX_C70A33B57ADA1FB5 ON product_color (color_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_color');
    }
}
