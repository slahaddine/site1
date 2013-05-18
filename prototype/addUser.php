<?php 
    require_once('../php/classes/Users.class.php');
    require_once('../php/classes/UsersDAO.class.php');
    
    if(isset($_REQUEST["addUsername"]) && $_REQUEST["addUsername"]!=""){
        if (!isset($uDAO))
            $uDAO = new UsersDAO(); 
        $user = new Users($_REQUEST["addUsername"], $_REQUEST["addPassword"], $_REQUEST["addFirstname"], $_REQUEST["addName"],$_REQUEST["addEmail"]); 
        echo $uDAO->inscription($user);
    }
?>
<html>
    <head>
        <title>
            Add new User
        </title>
    </head>
    <body>
        <div id="addUser">
            <form mehotd="POST" action="">
                <table>
                    <tr>
                        <td>
                            Username :
                        </td>
                        <td>
                            <input type="text" value="" name="addUsername"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password :
                        </td>
                        <td>
                            <input type="password" value="" name="addPassword"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Name :
                        </td>
                        <td>
                            <input type="text" value="" name="addName"/>
                        </td>
                        </td>
                    <tr>
                        <td>
                            First Name :
                        </td>
                        <td>
                            <input type="text" value="" name="addFirstname"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email :
                        </td>
                        <td>
                            <input type="text" value="" name="addEmail"/>
                        </td>
                    </tr>

                </table>
                <input type="submit" value="Cr&eacute;er" />
            </form>
        </div>

    </body>
</html>
