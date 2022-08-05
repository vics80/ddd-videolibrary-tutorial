<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220730222838 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("CREATE TABLE subtitle (id CHAR(36) NOT NULL COMMENT '(DC2Type:guid)', video_id CHAR(36) DEFAULT NULL COMMENT '(DC2Type:guid)', language VARCHAR(2) NOT NULL, INDEX IDX_518597B129C1004E (video_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;");
        $this->addSql("CREATE TABLE video (id CHAR(36) NOT NULL COMMENT '(DC2Type:guid)', title VARCHAR(300) NOT NULL, duration INT NOT NULL, status VARCHAR(20) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;");
        $this->addSql("ALTER TABLE subtitle ADD CONSTRAINT FK_518597B129C1004E FOREIGN KEY (video_id) REFERENCES video (id);");

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
