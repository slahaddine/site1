<?php
ob_start();
require_once('../php/classes/UsersDAO.class.php');
require_once('../php/classes/Users.class.php');
$identifiant = $_GET["id"];
if (ISSET($_REQUEST["newUsername"]) && (!$_REQUEST["newPwd"] == "") && (!$_REQUEST["newEmail"] == "") && (!$_REQUEST["newName"] == "") && (!$_REQUEST["newFname"] == "")) {
    if ($uDAO == null)
        $uDAO = new UsersDAO();
    $userToUpdate = new Users($_REQUEST["newUsername"], $_REQUEST["newPwd"], $_REQUEST["newFname"], $_REQUEST["newName"], $_REQUEST["newEmail"], $_REQUEST["newPrivilege"]);
    $uDAO->updateUser($identifiant, $userToUpdate);
    header('Location: ./administrationU.php');
    die();
}
?>
<html>
    <head>
        <title>
            Modify User Informations
        </title>
    </head>
    <body>
        <form action="" method="POST" >
            <table border='0'>
<?php
$uDAO = new UsersDAO();
$user = $uDAO->findUserById($_REQUEST["id"]);
?>
                <tr>
                    <td>
                        Username :
                    </td>
                    <td>
                        <input type='text' name='newUsername' value="<?php echo $user->getUsername(); ?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Nouveau Mot de passe: 
                    </td>
                    <td>
                        <input type='text' name='newPwd' value="<?php echo $user->getPassword(); ?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Nouveau Nom : 
                    </td>
                    <td>
                        <input type='text' name='newName' value="<?php echo $user->getName(); ?>" /> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Nouveau Pr&eacute;nom : 
                    </td>
                    <td>
                        <input type='text' name='newFname' value="<?php echo $user->getFirstName(); ?>" /> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Email: 
                    </td>
                    <td>
                        <input type='text' name='newEmail' value="<?php echo $user->getEmail(); ?>" /> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Privilege : 
                    </td>
                    <td>
                        <form>
                            <input type="radio" name="newPrivilege" value="user" checked="checked" />User<br>
                            <input type="radio" name="newPrivilege" value="admin" />administrator
                        </form>
                    </td>
                </tr>

            </table>
            <p color="red">[!!ATTENTION UN ADMINISTRATEUR PEUT ABSOLUMENT TOUT FAIRE, CHOISISSEZ BIEN QUI METTRE!!]</p>
            <input type="submit" value="Modifi&eacute; les informations de l'utilisateur" />
        </form>
    </body>
</html>
