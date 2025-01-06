<?php
require_once '../configs/Database.php';

class Users {
    protected $id;
    protected $name;
    protected $email;
    protected $password;
    protected $role;
    protected $isActive;

    public function __construct($id = null, $name = null, $email = null, $password = null, $role = null, $isActive = null) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->isActive = $isActive;
    }

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getRole() {
        return $this->role;
    }

    function getActivation() {
        return $this->isActive;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRole($role) {
        $this->role = $role;
    }

    function setActivation($isActive) {
        $this->isActive = $isActive;
    }

    public function register($name, $email, $password) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            session_start();
            
            $_SESSION['already'] = true;
            
            header('Location: ./index.php');
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (name, email, password, role, is_active) VALUES (?, ?, ?, 'customer', true)");
        $stmt->execute([$name, $email, $hashedPassword]);
    }

    public function logIn($email, $password) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if($user && password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            
            if($user['role'] == "admin") {
                if($user['is_active'] == 0) {
                    $_SESSION['noPerm'] = true;
                } else {
                    header("Location: ../dashboard/index.php");
                }
            } elseif($user['role'] == "customer") {
                if($user['is_active'] == 0) {
                    $_SESSION['noPerm'] = true;
                } else {
                    header("Location: ../index.php");
                }
            }
        } else {
            $_SESSION['false'] = true;
        }
    }

    public function getAllUsers() {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT id, name, email, is_active FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
