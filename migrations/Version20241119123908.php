<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241119123908 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ascensos (id INT AUTO_INCREMENT NOT NULL, usuarios_id INT DEFAULT NULL, vias_id INT DEFAULT NULL, ascensos_usuario_id INT DEFAULT NULL, ascensos_via_id INT DEFAULT NULL, id_usuario INT NOT NULL, id_via INT NOT NULL, fecha DATE DEFAULT NULL, INDEX IDX_DD7631E4F01D3B25 (usuarios_id), INDEX IDX_DD7631E479F72950 (vias_id), INDEX IDX_DD7631E4B60F5357 (ascensos_usuario_id), INDEX IDX_DD7631E4815713A3 (ascensos_via_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bloques (id INT AUTO_INCREMENT NOT NULL, zonas_id INT DEFAULT NULL, bloque_zonas_id INT DEFAULT NULL, id_zona INT NOT NULL, nombre VARCHAR(100) NOT NULL, descripcion VARCHAR(255) DEFAULT NULL, INDEX IDX_B52E7F29536A4DBA (zonas_id), INDEX IDX_B52E7F292E370690 (bloque_zonas_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE canal_comunicacion (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(100) NOT NULL, descripcion VARCHAR(255) DEFAULT NULL, fecha_creacion DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comentarios (id INT AUTO_INCREMENT NOT NULL, comentario_usuario_id INT DEFAULT NULL, tipo_comentario_id INT DEFAULT NULL, comentario_usuarios_id INT DEFAULT NULL, comentario_tipo_comentario_id INT DEFAULT NULL, vias_id INT DEFAULT NULL, restaurantes_id INT DEFAULT NULL, id_usuario INT NOT NULL, id_tipo_comentario INT NOT NULL, id_comentado INT NOT NULL, comentario VARCHAR(255) DEFAULT NULL, puntuacion INT DEFAULT NULL, fecha DATE NOT NULL, INDEX IDX_F54B3FC09C3894E9 (comentario_usuario_id), INDEX IDX_F54B3FC0F34184B2 (tipo_comentario_id), INDEX IDX_F54B3FC03E3BDF6D (comentario_usuarios_id), INDEX IDX_F54B3FC0D163A5A9 (comentario_tipo_comentario_id), INDEX IDX_F54B3FC079F72950 (vias_id), INDEX IDX_F54B3FC0E849FC0F (restaurantes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fotos (id INT AUTO_INCREMENT NOT NULL, usuarios_id INT DEFAULT NULL, vias_id INT DEFAULT NULL, tipo_foto_id INT DEFAULT NULL, fotos_usuario_id INT DEFAULT NULL, fotos_tipo_foto_id INT DEFAULT NULL, restaurantes_id INT DEFAULT NULL, id_usuario INT NOT NULL, id_tipo_foto INT NOT NULL, id_fotografiado INT NOT NULL, url VARCHAR(255) NOT NULL, descripcion VARCHAR(255) DEFAULT NULL, fecha_subida DATE NOT NULL, INDEX IDX_CB8405C7F01D3B25 (usuarios_id), INDEX IDX_CB8405C779F72950 (vias_id), INDEX IDX_CB8405C7694687F6 (tipo_foto_id), INDEX IDX_CB8405C7CABD4B73 (fotos_usuario_id), INDEX IDX_CB8405C78C4D93E0 (fotos_tipo_foto_id), INDEX IDX_CB8405C7E849FC0F (restaurantes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE miembro_canal (id INT AUTO_INCREMENT NOT NULL, usuarios_id INT DEFAULT NULL, canal_comunicacion_id INT DEFAULT NULL, usuario_id INT DEFAULT NULL, canal_id INT DEFAULT NULL, id_usuario INT NOT NULL, fecha_union DATE DEFAULT NULL, rol VARCHAR(100) DEFAULT NULL, INDEX IDX_CDAFAA24F01D3B25 (usuarios_id), INDEX IDX_CDAFAA24A28B2525 (canal_comunicacion_id), INDEX IDX_CDAFAA24DB38439E (usuario_id), INDEX IDX_CDAFAA2468DB5B2E (canal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurantes (id INT AUTO_INCREMENT NOT NULL, zonas_id INT DEFAULT NULL, restaurantes_zona_id INT DEFAULT NULL, id_zonas INT NOT NULL, nombre VARCHAR(255) NOT NULL, ubicacion VARCHAR(255) NOT NULL, contacto VARCHAR(255) DEFAULT NULL, descripcion VARCHAR(255) DEFAULT NULL, INDEX IDX_3B381D7A536A4DBA (zonas_id), INDEX IDX_3B381D7A61473580 (restaurantes_zona_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_comentario (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, descripcion VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_foto (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(100) NOT NULL, descripcion VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuarios (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(50) NOT NULL, total_ascensos INT DEFAULT NULL, genero VARCHAR(255) DEFAULT NULL, nivel_experiencia LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', fecha_registro DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuarios_canal_comunicacion (usuarios_id INT NOT NULL, canal_comunicacion_id INT NOT NULL, INDEX IDX_1ED114EF01D3B25 (usuarios_id), INDEX IDX_1ED114EA28B2525 (canal_comunicacion_id), PRIMARY KEY(usuarios_id, canal_comunicacion_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vias (id INT AUTO_INCREMENT NOT NULL, bloques_id INT DEFAULT NULL, vias_bloque_id INT DEFAULT NULL, id_bloque INT NOT NULL, nombre VARCHAR(255) NOT NULL, grado_dificultad VARCHAR(20) DEFAULT NULL, descripcion VARCHAR(255) DEFAULT NULL, total_ascensos INT DEFAULT NULL, INDEX IDX_9DFCAA9325ACD01C (bloques_id), INDEX IDX_9DFCAA933AC312C0 (vias_bloque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zonas (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(100) NOT NULL, ubicacion VARCHAR(255) NOT NULL, descripcion VARCHAR(255) DEFAULT NULL, total_ascensos INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ascensos ADD CONSTRAINT FK_DD7631E4F01D3B25 FOREIGN KEY (usuarios_id) REFERENCES usuarios (id)');
        $this->addSql('ALTER TABLE ascensos ADD CONSTRAINT FK_DD7631E479F72950 FOREIGN KEY (vias_id) REFERENCES vias (id)');
        $this->addSql('ALTER TABLE ascensos ADD CONSTRAINT FK_DD7631E4B60F5357 FOREIGN KEY (ascensos_usuario_id) REFERENCES usuarios (id)');
        $this->addSql('ALTER TABLE ascensos ADD CONSTRAINT FK_DD7631E4815713A3 FOREIGN KEY (ascensos_via_id) REFERENCES vias (id)');
        $this->addSql('ALTER TABLE bloques ADD CONSTRAINT FK_B52E7F29536A4DBA FOREIGN KEY (zonas_id) REFERENCES zonas (id)');
        $this->addSql('ALTER TABLE bloques ADD CONSTRAINT FK_B52E7F292E370690 FOREIGN KEY (bloque_zonas_id) REFERENCES zonas (id)');
        $this->addSql('ALTER TABLE comentarios ADD CONSTRAINT FK_F54B3FC09C3894E9 FOREIGN KEY (comentario_usuario_id) REFERENCES usuarios (id)');
        $this->addSql('ALTER TABLE comentarios ADD CONSTRAINT FK_F54B3FC0F34184B2 FOREIGN KEY (tipo_comentario_id) REFERENCES tipo_comentario (id)');
        $this->addSql('ALTER TABLE comentarios ADD CONSTRAINT FK_F54B3FC03E3BDF6D FOREIGN KEY (comentario_usuarios_id) REFERENCES usuarios (id)');
        $this->addSql('ALTER TABLE comentarios ADD CONSTRAINT FK_F54B3FC0D163A5A9 FOREIGN KEY (comentario_tipo_comentario_id) REFERENCES tipo_comentario (id)');
        $this->addSql('ALTER TABLE comentarios ADD CONSTRAINT FK_F54B3FC079F72950 FOREIGN KEY (vias_id) REFERENCES vias (id)');
        $this->addSql('ALTER TABLE comentarios ADD CONSTRAINT FK_F54B3FC0E849FC0F FOREIGN KEY (restaurantes_id) REFERENCES restaurantes (id)');
        $this->addSql('ALTER TABLE fotos ADD CONSTRAINT FK_CB8405C7F01D3B25 FOREIGN KEY (usuarios_id) REFERENCES usuarios (id)');
        $this->addSql('ALTER TABLE fotos ADD CONSTRAINT FK_CB8405C779F72950 FOREIGN KEY (vias_id) REFERENCES vias (id)');
        $this->addSql('ALTER TABLE fotos ADD CONSTRAINT FK_CB8405C7694687F6 FOREIGN KEY (tipo_foto_id) REFERENCES tipo_foto (id)');
        $this->addSql('ALTER TABLE fotos ADD CONSTRAINT FK_CB8405C7CABD4B73 FOREIGN KEY (fotos_usuario_id) REFERENCES usuarios (id)');
        $this->addSql('ALTER TABLE fotos ADD CONSTRAINT FK_CB8405C78C4D93E0 FOREIGN KEY (fotos_tipo_foto_id) REFERENCES tipo_foto (id)');
        $this->addSql('ALTER TABLE fotos ADD CONSTRAINT FK_CB8405C7E849FC0F FOREIGN KEY (restaurantes_id) REFERENCES restaurantes (id)');
        $this->addSql('ALTER TABLE miembro_canal ADD CONSTRAINT FK_CDAFAA24F01D3B25 FOREIGN KEY (usuarios_id) REFERENCES usuarios (id)');
        $this->addSql('ALTER TABLE miembro_canal ADD CONSTRAINT FK_CDAFAA24A28B2525 FOREIGN KEY (canal_comunicacion_id) REFERENCES canal_comunicacion (id)');
        $this->addSql('ALTER TABLE miembro_canal ADD CONSTRAINT FK_CDAFAA24DB38439E FOREIGN KEY (usuario_id) REFERENCES usuarios (id)');
        $this->addSql('ALTER TABLE miembro_canal ADD CONSTRAINT FK_CDAFAA2468DB5B2E FOREIGN KEY (canal_id) REFERENCES canal_comunicacion (id)');
        $this->addSql('ALTER TABLE restaurantes ADD CONSTRAINT FK_3B381D7A536A4DBA FOREIGN KEY (zonas_id) REFERENCES zonas (id)');
        $this->addSql('ALTER TABLE restaurantes ADD CONSTRAINT FK_3B381D7A61473580 FOREIGN KEY (restaurantes_zona_id) REFERENCES zonas (id)');
        $this->addSql('ALTER TABLE usuarios_canal_comunicacion ADD CONSTRAINT FK_1ED114EF01D3B25 FOREIGN KEY (usuarios_id) REFERENCES usuarios (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE usuarios_canal_comunicacion ADD CONSTRAINT FK_1ED114EA28B2525 FOREIGN KEY (canal_comunicacion_id) REFERENCES canal_comunicacion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vias ADD CONSTRAINT FK_9DFCAA9325ACD01C FOREIGN KEY (bloques_id) REFERENCES bloques (id)');
        $this->addSql('ALTER TABLE vias ADD CONSTRAINT FK_9DFCAA933AC312C0 FOREIGN KEY (vias_bloque_id) REFERENCES bloques (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ascensos DROP FOREIGN KEY FK_DD7631E4F01D3B25');
        $this->addSql('ALTER TABLE ascensos DROP FOREIGN KEY FK_DD7631E479F72950');
        $this->addSql('ALTER TABLE ascensos DROP FOREIGN KEY FK_DD7631E4B60F5357');
        $this->addSql('ALTER TABLE ascensos DROP FOREIGN KEY FK_DD7631E4815713A3');
        $this->addSql('ALTER TABLE bloques DROP FOREIGN KEY FK_B52E7F29536A4DBA');
        $this->addSql('ALTER TABLE bloques DROP FOREIGN KEY FK_B52E7F292E370690');
        $this->addSql('ALTER TABLE comentarios DROP FOREIGN KEY FK_F54B3FC09C3894E9');
        $this->addSql('ALTER TABLE comentarios DROP FOREIGN KEY FK_F54B3FC0F34184B2');
        $this->addSql('ALTER TABLE comentarios DROP FOREIGN KEY FK_F54B3FC03E3BDF6D');
        $this->addSql('ALTER TABLE comentarios DROP FOREIGN KEY FK_F54B3FC0D163A5A9');
        $this->addSql('ALTER TABLE comentarios DROP FOREIGN KEY FK_F54B3FC079F72950');
        $this->addSql('ALTER TABLE comentarios DROP FOREIGN KEY FK_F54B3FC0E849FC0F');
        $this->addSql('ALTER TABLE fotos DROP FOREIGN KEY FK_CB8405C7F01D3B25');
        $this->addSql('ALTER TABLE fotos DROP FOREIGN KEY FK_CB8405C779F72950');
        $this->addSql('ALTER TABLE fotos DROP FOREIGN KEY FK_CB8405C7694687F6');
        $this->addSql('ALTER TABLE fotos DROP FOREIGN KEY FK_CB8405C7CABD4B73');
        $this->addSql('ALTER TABLE fotos DROP FOREIGN KEY FK_CB8405C78C4D93E0');
        $this->addSql('ALTER TABLE fotos DROP FOREIGN KEY FK_CB8405C7E849FC0F');
        $this->addSql('ALTER TABLE miembro_canal DROP FOREIGN KEY FK_CDAFAA24F01D3B25');
        $this->addSql('ALTER TABLE miembro_canal DROP FOREIGN KEY FK_CDAFAA24A28B2525');
        $this->addSql('ALTER TABLE miembro_canal DROP FOREIGN KEY FK_CDAFAA24DB38439E');
        $this->addSql('ALTER TABLE miembro_canal DROP FOREIGN KEY FK_CDAFAA2468DB5B2E');
        $this->addSql('ALTER TABLE restaurantes DROP FOREIGN KEY FK_3B381D7A536A4DBA');
        $this->addSql('ALTER TABLE restaurantes DROP FOREIGN KEY FK_3B381D7A61473580');
        $this->addSql('ALTER TABLE usuarios_canal_comunicacion DROP FOREIGN KEY FK_1ED114EF01D3B25');
        $this->addSql('ALTER TABLE usuarios_canal_comunicacion DROP FOREIGN KEY FK_1ED114EA28B2525');
        $this->addSql('ALTER TABLE vias DROP FOREIGN KEY FK_9DFCAA9325ACD01C');
        $this->addSql('ALTER TABLE vias DROP FOREIGN KEY FK_9DFCAA933AC312C0');
        $this->addSql('DROP TABLE ascensos');
        $this->addSql('DROP TABLE bloques');
        $this->addSql('DROP TABLE canal_comunicacion');
        $this->addSql('DROP TABLE comentarios');
        $this->addSql('DROP TABLE fotos');
        $this->addSql('DROP TABLE miembro_canal');
        $this->addSql('DROP TABLE restaurantes');
        $this->addSql('DROP TABLE tipo_comentario');
        $this->addSql('DROP TABLE tipo_foto');
        $this->addSql('DROP TABLE usuarios');
        $this->addSql('DROP TABLE usuarios_canal_comunicacion');
        $this->addSql('DROP TABLE vias');
        $this->addSql('DROP TABLE zonas');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
