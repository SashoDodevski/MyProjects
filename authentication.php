<?php

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . "./database/db.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sqlAdmins = "SELECT * FROM admins WHERE email = :email LIMIT 1";
    $stmtAdmins = $pdo->prepare($sqlAdmins);
    $stmtAdmins->bindParam('email', $email);
    $stmtAdmins->execute([
          'email' => $email
    ]);

    $sqlUsers = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $stmtUsers = $pdo->prepare($sqlUsers);
    $stmtUsers->bindParam('email', $email);
    $stmtUsers->execute([
          'email' => $email
    ]);


    if ($stmtAdmins->rowCount() == 1) {
        $admin = $stmtAdmins->fetch();

        if (password_verify($password, $admin['password'])) {
            $_SESSION['username'] = $admin['name'];

            header('Location: adminInterface.php');
        } else {
            $_SESSION['msg'] = 'Wrong password!';

            header('Location: signin.php');
            die();
        }
    } elseif ($stmtUsers->rowCount() == 1) {
        $user = $stmtUsers->fetch();

        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['name'];

            header('Location: index.php');
        } else {
            $_SESSION['msg'] = 'Wrong password!';

            header('Location: signin.php');
            die();
        } 
    } else {
        $_SESSION['msg'] = 'Wrong credentials!';

        header('Location: signin.php');
        die();
    }
} else {
    header('Location: index.php');
    die();
}
