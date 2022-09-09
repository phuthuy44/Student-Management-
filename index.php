<!Doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Student Management System</title>
        <link rel="stylesheet" href="./css/css.css">
    </head>
    <body>
    <h5 align="right" style="margin-right:20px"><a href="../Student-Management-/page/login.php">Admin Login</a></h5>
    <h1 align="center">Welcome to Student Managerment System</h1>
    
    <form action="index.php" method="post">
    <table style="width:40%" align="center" border="1">
        <tr>
            <td colspan="2" align="center">Student Information</td>
        </tr>
        <tr>
            <td align="left">Choose Standed</td>
            <td>
                <select name="std" required>
                    <option value="1">1st</option>
                    <option value="2">2nd</option>
                    <option value="3">3rd</option>
                    <option value="4">4th</option>
                    <option value="5">5th</option>
                    <option value="6">6th</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="left">Enter Rollno</td>
            <td>
                <input type="text" name="rollno" required>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="submit" value="Show Inform"> </td>
        </tr>
    </table>
    </form>

    </body>
</html>