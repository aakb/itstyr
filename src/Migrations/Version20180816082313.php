<?php

declare(strict_types=1);

/*
 * This file is part of aakb/itstyr.
 *
 * (c) 2018–2019 ITK Development
 *
 * This source file is subject to the MIT license.
 */

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180816082313 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE report DROP sys_dato_to_previous_internal_system_dependencies, DROP sys_dato_from_previous_external_system_dependencies');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE report ADD sys_dato_to_previous_internal_system_dependencies LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD sys_dato_from_previous_external_system_dependencies LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
