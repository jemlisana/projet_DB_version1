<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211119121844 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message ADD emetteur_id INT DEFAULT NULL, ADD recepteur_id INT DEFAULT NULL, ADD message_text VARCHAR(4000) NOT NULL, ADD status VARCHAR(255) NOT NULL, ADD date_envoi DATE NOT NULL, ADD date_lecture DATE NOT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F79E92E8C FOREIGN KEY (emetteur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F3B49782D FOREIGN KEY (recepteur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F79E92E8C ON message (emetteur_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F3B49782D ON message (recepteur_id)');
        $this->addSql('ALTER TABLE projet ADD admin_id INT DEFAULT NULL, ADD chef_projet_id INT DEFAULT NULL, DROP id_chef_projet');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9642B8210 FOREIGN KEY (admin_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9D3B0D67C FOREIGN KEY (chef_projet_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_50159CA9642B8210 ON projet (admin_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_50159CA9D3B0D67C ON projet (chef_projet_id)');
        $this->addSql('ALTER TABLE tache ADD membre_equipe_id INT DEFAULT NULL, ADD projet_id INT DEFAULT NULL, ADD module_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_93872075D2E31877 FOREIGN KEY (membre_equipe_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_93872075C18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE tache ADD CONSTRAINT FK_93872075AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id)');
        $this->addSql('CREATE INDEX IDX_93872075D2E31877 ON tache (membre_equipe_id)');
        $this->addSql('CREATE INDEX IDX_93872075C18272 ON tache (projet_id)');
        $this->addSql('CREATE INDEX IDX_93872075AFC2B591 ON tache (module_id)');
        $this->addSql('ALTER TABLE utilisateur ADD role_id INT DEFAULT NULL, DROP role');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3D60322AC ON utilisateur (role_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F79E92E8C');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F3B49782D');
        $this->addSql('DROP INDEX IDX_B6BD307F79E92E8C ON message');
        $this->addSql('DROP INDEX IDX_B6BD307F3B49782D ON message');
        $this->addSql('ALTER TABLE message DROP emetteur_id, DROP recepteur_id, DROP message_text, DROP status, DROP date_envoi, DROP date_lecture');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9642B8210');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9D3B0D67C');
        $this->addSql('DROP INDEX IDX_50159CA9642B8210 ON projet');
        $this->addSql('DROP INDEX UNIQ_50159CA9D3B0D67C ON projet');
        $this->addSql('ALTER TABLE projet ADD id_chef_projet INT NOT NULL, DROP admin_id, DROP chef_projet_id');
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_93872075D2E31877');
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_93872075C18272');
        $this->addSql('ALTER TABLE tache DROP FOREIGN KEY FK_93872075AFC2B591');
        $this->addSql('DROP INDEX IDX_93872075D2E31877 ON tache');
        $this->addSql('DROP INDEX IDX_93872075C18272 ON tache');
        $this->addSql('DROP INDEX IDX_93872075AFC2B591 ON tache');
        $this->addSql('ALTER TABLE tache DROP membre_equipe_id, DROP projet_id, DROP module_id');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3D60322AC');
        $this->addSql('DROP INDEX UNIQ_1D1C63B3D60322AC ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur ADD role VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP role_id');
    }
}
