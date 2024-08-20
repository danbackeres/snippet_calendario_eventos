<?php

namespace App\Model;

use PDO;
use PDOException;

class EventoModel
{
    private PDO $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('sqlite:/var/www/config/exemplo.sqlite');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            exit();
        }
    }

    public function getEventos(): array
    {
        $stmt = $this->db->query("SELECT * FROM evento ORDER BY data ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEventosPorDia($dia, $mes, $ano): array
    {
        $stmt = $this->db->prepare("SELECT * FROM evento WHERE strftime('%d', data) = :dia AND strftime('%m', data) = :mes AND strftime('%Y', data) = :ano");
        $stmt->execute([':dia' => sprintf('%02d', $dia), ':mes' => sprintf('%02d', $mes), ':ano' => $ano]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEventoById($id): array
    {
        $stmt = $this->db->prepare("SELECT * FROM evento WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}