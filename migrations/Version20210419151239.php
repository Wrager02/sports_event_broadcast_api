<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210419151239 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event ADD COLUMN game VARCHAR(255) DEFAULT NULL');
        $this->addSql('DROP INDEX IDX_ED52E8AF71F7E88B');
        $this->addSql('DROP INDEX IDX_ED52E8AF296CD8AE');
        $this->addSql('CREATE TEMPORARY TABLE __temp__event_team_1 AS SELECT event_id, team_id FROM event_team_1');
        $this->addSql('DROP TABLE event_team_1');
        $this->addSql('CREATE TABLE event_team_1 (event_id INTEGER NOT NULL, team_id INTEGER NOT NULL, PRIMARY KEY(event_id, team_id), CONSTRAINT FK_ED52E8AF71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_ED52E8AF296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO event_team_1 (event_id, team_id) SELECT event_id, team_id FROM __temp__event_team_1');
        $this->addSql('DROP TABLE __temp__event_team_1');
        $this->addSql('CREATE INDEX IDX_ED52E8AF71F7E88B ON event_team_1 (event_id)');
        $this->addSql('CREATE INDEX IDX_ED52E8AF296CD8AE ON event_team_1 (team_id)');
        $this->addSql('DROP INDEX IDX_745BB91571F7E88B');
        $this->addSql('DROP INDEX IDX_745BB915296CD8AE');
        $this->addSql('CREATE TEMPORARY TABLE __temp__event_team_2 AS SELECT event_id, team_id FROM event_team_2');
        $this->addSql('DROP TABLE event_team_2');
        $this->addSql('CREATE TABLE event_team_2 (event_id INTEGER NOT NULL, team_id INTEGER NOT NULL, PRIMARY KEY(event_id, team_id), CONSTRAINT FK_745BB91571F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_745BB915296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO event_team_2 (event_id, team_id) SELECT event_id, team_id FROM __temp__event_team_2');
        $this->addSql('DROP TABLE __temp__event_team_2');
        $this->addSql('CREATE INDEX IDX_745BB91571F7E88B ON event_team_2 (event_id)');
        $this->addSql('CREATE INDEX IDX_745BB915296CD8AE ON event_team_2 (team_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__event AS SELECT id, time FROM event');
        $this->addSql('DROP TABLE event');
        $this->addSql('CREATE TABLE event (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, time VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO event (id, time) SELECT id, time FROM __temp__event');
        $this->addSql('DROP TABLE __temp__event');
        $this->addSql('DROP INDEX IDX_ED52E8AF71F7E88B');
        $this->addSql('DROP INDEX IDX_ED52E8AF296CD8AE');
        $this->addSql('CREATE TEMPORARY TABLE __temp__event_team_1 AS SELECT event_id, team_id FROM event_team_1');
        $this->addSql('DROP TABLE event_team_1');
        $this->addSql('CREATE TABLE event_team_1 (event_id INTEGER NOT NULL, team_id INTEGER NOT NULL, PRIMARY KEY(event_id, team_id))');
        $this->addSql('INSERT INTO event_team_1 (event_id, team_id) SELECT event_id, team_id FROM __temp__event_team_1');
        $this->addSql('DROP TABLE __temp__event_team_1');
        $this->addSql('CREATE INDEX IDX_ED52E8AF71F7E88B ON event_team_1 (event_id)');
        $this->addSql('CREATE INDEX IDX_ED52E8AF296CD8AE ON event_team_1 (team_id)');
        $this->addSql('DROP INDEX IDX_745BB91571F7E88B');
        $this->addSql('DROP INDEX IDX_745BB915296CD8AE');
        $this->addSql('CREATE TEMPORARY TABLE __temp__event_team_2 AS SELECT event_id, team_id FROM event_team_2');
        $this->addSql('DROP TABLE event_team_2');
        $this->addSql('CREATE TABLE event_team_2 (event_id INTEGER NOT NULL, team_id INTEGER NOT NULL, PRIMARY KEY(event_id, team_id))');
        $this->addSql('INSERT INTO event_team_2 (event_id, team_id) SELECT event_id, team_id FROM __temp__event_team_2');
        $this->addSql('DROP TABLE __temp__event_team_2');
        $this->addSql('CREATE INDEX IDX_745BB91571F7E88B ON event_team_2 (event_id)');
        $this->addSql('CREATE INDEX IDX_745BB915296CD8AE ON event_team_2 (team_id)');
    }
}
