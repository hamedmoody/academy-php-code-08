<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regsiter</title>
</head>
<body>
    <form action="register_process.php" method="post">
        <p>
            <label for="name">Name:</label>
            <input type="text" id="name" name="first_name">
        </p>
        <p>
            <label for="family">Family:</label>
            <input type="text" id="family" name="last_name">
        </p>
        <p>
            <input type="text" name="grade[]">
            <input type="text" name="grade[]">
            <input type="text" name="grade[]">
            <input type="text" name="grade[]">
            <input type="text" name="grade[]">
            <input type="text" name="grade[]">
        </p>
        <p>
            <label for="skills">Skills</label>
            <select name="skills[]" id="" multiple>
                <option value="php">PHP</option>
                <option value="html">HTML</option>
                <option value="js">JS</option>
                <option value="css">CSS</option>
            </select>
        </p>
        <button>
            Send Form
        </button>
    </form>
</body>
</html>