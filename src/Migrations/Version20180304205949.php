<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180304205949 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE APP_USERS (uid INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, lastname VARCHAR(20) NOT NULL, birthdate VARCHAR(10) NOT NULL, email VARCHAR(40) NOT NULL, password VARCHAR(100) NOT NULL, salt VARCHAR(100) NOT NULL, roles VARCHAR(20) NOT NULL, username VARCHAR(40) NOT NULL, UNIQUE INDEX UNIQ_813E33FDE7927C74 (email), UNIQUE INDEX UNIQ_813E33FDF85E0677 (username), PRIMARY KEY(uid)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE APP_USERS');
    }
}
