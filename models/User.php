<?php
require_once '../config/database.php';

class User {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function register($nombre, $email, $password, $tipo_usuario, $id_empresa = null) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nombre, email, password, tipo_usuario, id_empresa, fecha_registro) VALUES (?, ?, ?, ?, ?, NOW())");
        return $stmt->execute([$nombre, $email, $hashed_password, $tipo_usuario, $id_empresa]);
    }

    public function login($email, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function getSubscription($id_usuario) {
        $stmt = $this->pdo->prepare("
            SELECT s.*, p.nombre_plan, p.tipo_usuario, p.descripcion 
            FROM suscripciones s 
            JOIN planes p ON s.id_plan = p.id_plan 
            WHERE s.id_usuario = ? AND s.estado = 'Activa'
        ");
        $stmt->execute([$id_usuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function subscribe($id_usuario, $id_plan) {
        $stmt = $this->pdo->prepare("SELECT * FROM planes WHERE id_plan = ?");
        $stmt->execute([$id_plan]);
        $plan = $stmt->fetch(PDO::FETCH_ASSOC);

        $fecha_inicio = date('Y-m-d H:i:s');
        $fecha_fin = $plan['duracion'] === 'Mensual' 
            ? date('Y-m-d H:i:s', strtotime('+1 month')) 
            : date('Y-m-d H:i:s', strtotime('+1 year'));

        $stmt = $this->pdo->prepare("INSERT INTO suscripciones (id_usuario, id_plan, fecha_inicio, fecha_fin) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$id_usuario, $id_plan, $fecha_inicio, $fecha_fin]);
    }
}