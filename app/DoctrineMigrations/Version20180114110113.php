<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180114110113 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, recipe_id INT DEFAULT NULL, unit_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, amount DOUBLE PRECISION NOT NULL, INDEX IDX_6BAF787059D8A214 (recipe_id), INDEX IDX_6BAF7870F8BD700D (unit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, recipe_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, file_name VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, extension VARCHAR(255) NOT NULL, is_main TINYINT(1) NOT NULL, INDEX IDX_14B7841859D8A214 (recipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, preparation_time INT DEFAULT NULL, preparation_time_text VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, modified_at DATETIME DEFAULT NULL, INDEX IDX_DA88B137F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF787059D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF7870F8BD700D FOREIGN KEY (unit_id) REFERENCES unit (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B7841859D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B137F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF7870F8BD700D');
        $this->addSql('ALTER TABLE recipe DROP FOREIGN KEY FK_DA88B137F675F31B');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF787059D8A214');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B7841859D8A214');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE unit');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE recipe');
    }
}
