<?php require_once('../template/headerNoLogin.php'); ?>
<link rel="stylesheet" type="text/css" href="../css/signin.css">
    <title>Sign in</title>
</head>

<?php
require_once ('config.php');
require_once '../src/clean.php';
$clean = new clean();

{
    try {

            $connection = new PDO($dsn, $username, $password, $options);

            $sql = "SELECT firstname, password from users where firstname = :USER";
            $statement = $connection->prepare($sql);
            $tmpUser = ($_POST['Username']);
            $statement->bindParam(':USER', $tmpUser, PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetchAll();
            foreach ($result as $row => $rows) 
            {
                $fname_db = $rows['firstname'];
                $pwd_db = $rows['password'];

                if (($_POST['Username'] == $fname_db) && ($_POST['Password'] == $pwd_db))
                {
                    $_SESSION['Username'] = $fname_db;
                    $_SESSION['Active'] = true;
                    header(String: "location:index.php");
                    exit;
                }
            else 
            {
                echo 'Incorrect Username or Password';
            }
            }
    }
    catch
        (Exception $e)
        {
            echo '<div class="messages-error">Error Logging in:' . $e->getMessage() . '</div>';
        }
}