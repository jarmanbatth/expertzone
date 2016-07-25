<?php
include"connection.php";
include "public_header.php";
?>
<form  action="feedbackaction.php" method="post">
    <table>
        <tr>
          <td colspan="2"> <h2>FEEDBACK FORM</h2></td>
        </tr>
        <tr>
            <td>
                Email
            </td>
            <td>
                <input type="email" name="mail" required placeholder="Email-ID">

            </td>
        </tr>
        <tr>
            <td>
                Message:
            </td>
            <td>
                <textarea name="message" required placeholder="Give Feedback"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                Type:
            </td>
            <td>
               <select name="sel" required>
                   <option value="">-----Select-----</option>
                   <option value="suggestion">Suggestion</option>
                   <option value="complaint">Complaint</option>
               </select>
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td>
                <input type="submit" value="submit">
            </td>
        </tr>
    </table>
</form>
<?php   include "footer.html";  ?>