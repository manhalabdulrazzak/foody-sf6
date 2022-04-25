<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220424224809 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE addon DROP FOREIGN KEY FK_D185917F4584665A');
        $this->addSql('DROP INDEX IDX_D185917F4584665A ON addon');
        $this->addSql('ALTER TABLE addon DROP product_id');
        $this->addSql('ALTER TABLE attribute DROP FOREIGN KEY FK_FA7AEFFB4584665A');
        $this->addSql('DROP INDEX IDX_FA7AEFFB4584665A ON attribute');
        $this->addSql('ALTER TABLE attribute DROP product_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE addon ADD product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE addon ADD CONSTRAINT FK_D185917F4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_D185917F4584665A ON addon (product_id)');
        $this->addSql('ALTER TABLE attribute ADD product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE attribute ADD CONSTRAINT FK_FA7AEFFB4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_FA7AEFFB4584665A ON attribute (product_id)');
    }
}
