<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190428181743 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE unidade CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE usuario ADD username VARCHAR(180) NOT NULL, CHANGE email email VARCHAR(60) NOT NULL, CHANGE roles roles VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05DF85E0677 ON usuario (username)');
        $this->addSql('ALTER TABLE item_pedido CHANGE id_pedido id_pedido INT DEFAULT NULL, CHANGE id_produto id_produto INT DEFAULT NULL, CHANGE preco_item preco NUMERIC(10, 2) NOT NULL');
        $this->addSql('ALTER TABLE pedido CHANGE id_usuario id_usuario INT DEFAULT NULL, CHANGE preco_final valor NUMERIC(10, 2) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE item_pedido CHANGE id_pedido id_pedido INT NOT NULL, CHANGE id_produto id_produto INT NOT NULL, CHANGE preco preco_item NUMERIC(10, 2) NOT NULL');
        $this->addSql('ALTER TABLE pedido CHANGE id_usuario id_usuario INT NOT NULL, CHANGE valor preco_final NUMERIC(10, 2) NOT NULL');
        $this->addSql('ALTER TABLE unidade CHANGE id id INT NOT NULL');
        $this->addSql('DROP INDEX UNIQ_2265B05DF85E0677 ON usuario');
        $this->addSql('ALTER TABLE usuario DROP username, CHANGE email email VARCHAR(180) NOT NULL COLLATE utf8_general_ci, CHANGE roles roles JSON NOT NULL');
    }
}
