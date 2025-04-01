<?php
session_start();

$Link_site = "http://" . $_SERVER['HTTP_HOST'] . "/";

include("../config/db_config.php");

if (isset($_SESSION['user'])) {
    $session_admin = str_replace('&', '\u0026', json_encode($_SESSION['user']));
    header("Location: " . $Link_site . "index.php");
    exit();
}

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
if ($password == "") {
    $password = null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($email) && $password === null) {
        // Cas 1 : L'email est fourni, mais le mot de passe est vide. Vérifie si l'utilisateur existe.
        $sql_request = "SELECT * FROM admin WHERE email = :email";
        $stmt = $pdo->prepare($sql_request);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Utilisateur trouvé. Vérifie maintenant si un mot de passe existe déjà.
            if ($user['password'] === null) {
                // L'utilisateur n'a pas de mot de passe. Génère et stocke un token.
                $error_message = "Un compte a été trouvé avec cet email mais ne possède pas de mot de passe, veuillez créer un mot de passe.";
                if (isset($_SESSION['token'])) {
                    unset($_SESSION['token']);
                }
                $token = bin2hex(random_bytes(16));
                $user_id = $user['id'];
                $code_token[$user_id] = $token;
                $_SESSION['token'] = $code_token;
                echo "<meta name=\"token\" content=\"" . htmlspecialchars($token) . "\">";
?>
                <script src="../config/js/pass_create.js"></script>
<?php
            } else {
                // L'utilisateur a déjà un mot de passe.  Affiche un message d'erreur.
                $error_message = "Un mot de passe existe déjà pour cet email. Veuillez vous connecter.";
            }
        } else {
            $error_message = 'Aucun compte trouvé avec cet email.';
        }
    } else {
        // Cas 2 : Email et mot de passe sont fournis. Tente la connexion.
        $sql_request = "SELECT * FROM admin WHERE email = :email";
        $stmt = $pdo->prepare($sql_request);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Utilisateur trouvé, maintenant vérifie le mot de passe.
            if (password_verify($password, $user['password'])) {
                // Le mot de passe est correct. Définit la session et redirige.
                //pour plus de sécuriter et eviter une attaque de session fixation, on génère un nouveau token
                // et on le stocke dans la base de données et dans la session.
                $token_session = bin2hex(random_bytes(16));

                $sql_request = "UPDATE admin SET session = :token WHERE id = :id";
                $stmt = $pdo->prepare($sql_request);
                $stmt->bindParam(':token', $token_session);
                $stmt->bindParam(':id', $user['id']);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {

                    $_SESSION['user'] = array(
                        'id' => $user['id'],
                        'token' => $token_session,
                        'valid' => true,
                    );

                    header("Location: " . $Link_site . "index.php");
                    error_log("Connexion réussie pour l'utilisateur : " . $user['email']);
                    error_log("Redirection vers: " . $Link_site . "index.php");
                    exit();
                } else {
                    $error_message = 'Erreur lors de la mise à jour de la session.';
                }
            } else {
                $error_message = 'Mot de passe incorrect.';
            }
        } else {
            $error_message = 'Aucun compte trouvé avec cet email.';
        }
    }
}
include("../banniere.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="login-center">
        <div class="login-container-form">
            <h1>Connexion</h1>
            <form action="login.php" method="post" class="login-form">
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="email" name="email" required value="<?php echo $email; ?>"><br>

                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password"><br><br>

                <input type="submit" value="Se connecter">
            </form>
            <?php if (isset($error_message)) { ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php } ?>
        </div>
    </div>

</body>

</html>