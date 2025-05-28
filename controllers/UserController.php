<?php
require_once '../models/User.php';

class UserController {
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->user->login($email, $password);

            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id_usuario'];
                $_SESSION['tipo_usuario'] = $user['tipo_usuario'];

                $subscription = $this->user->getSubscription($user['id_usuario']);
                if (!$subscription) {
                    header("Location: /oigotuqueja/public/?action=choosePlan");
                    exit;
                }

                header("Location: /oigotuqueja/public/?action=dashboard");
                exit;
            } else {
                $error = "Credenciales incorrectas.";
            }
        }
        require_once '../views/users/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $tipo_usuario = $_POST['tipo_usuario'];
            $id_empresa = $tipo_usuario === 'Representante' ? $_POST['id_empresa'] : null;

            // Validación básica
            if (empty($nombre) || empty($email) || empty($password)) {
                $error = "Todos los campos son obligatorios.";
            } elseif ($this->user->register($nombre, $email, $password, $tipo_usuario, $id_empresa)) {
                header("Location: /oigotuqueja/public/?action=login");
                exit;
            } else {
                $error = "Error al registrar el usuario.";
            }
        }
        require_once '../views/users/register.php';
    }

    public function registerClient() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST['tipo_usuario'] = 'Cliente';
            return $this->register();
        }
        require_once '../views/users/register_client.php';
    }

    public function registerCompany() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST['tipo_usuario'] = 'Representante';
            return $this->register();
        }
        require_once '../views/users/register_company.php';
    }

    public function choosePlan() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /oigotuqueja/public/?action=login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_plan = $_POST['id_plan'];
            $this->user->subscribe($_SESSION['user_id'], $id_plan);
            header("Location: /oigotuqueja/public/?action=dashboard");
            exit;
        }

        $stmt = $this->pdo->prepare("SELECT * FROM planes WHERE tipo_usuario = ?");
        $stmt->execute([$_SESSION['tipo_usuario'] === 'Cliente' ? 'Customer' : 'Company']);
        $plans = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once '../views/users/choose_plan.php';
    }

    public function dashboard() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /oigotuqueja/public/?action=login");
            exit;
        }
        require_once '../views/users/dashboard.php';
    }
}