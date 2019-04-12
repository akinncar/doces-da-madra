<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190412225154 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX cpf ON usuario');
        $this->addSql('ALTER TABLE usuario ADD roles JSON NOT NULL, ADD password VARCHAR(255) NOT NULL, DROP nome, DROP cpf, DROP senha, DROP role, CHANGE email email VARCHAR(180) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05DE7927C74 ON usuario (email)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_2265B05DE7927C74 ON usuario');
        $this->addSql('ALTER TABLE usuario ADD nome VARCHAR(60) NOT NULL COLLATE utf8_general_ci, ADD cpf VARCHAR(15) NOT NULL COLLATE utf8_general_ci, ADD senha VARCHAR(60) NOT NULL COLLATE utf8_general_ci, ADD role VARCHAR(25) DEFAULT NULL COLLATE utf8_general_ci, DROP roles, DROP password, CHANGE email email VARCHAR(60) DEFAULT NULL COLLATE utf8_general_ci');
        $this->addSql('CREATE UNIQUE INDEX cpf ON usuario (cpf)');
    }
}
