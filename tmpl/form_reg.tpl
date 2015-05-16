 <h1>Регистация</h1>
 %message%
<div id="reg">
    <form name="form_reg" action="function.php" method="post">
        <table>
        <tr>
            <td> Логин:</td>
            <td><input type="text" name="login"> </td>
        </tr>
        <tr>
            <td> Пароль: </td>
            <td><input type="password" name="password"> </td>
        </tr>
        <tr>
            <td colspan="2"> 
                Капча: <img src="captcha.php">
            </td>
        </tr>
         <tr>
             <td>
                 Проверочный код:
             </td>
             <td > 
                <input type="text" name="captcha">
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="send_reg" value="Зарегистрироваться"></td>
        </tr>

        </table>
    </form>