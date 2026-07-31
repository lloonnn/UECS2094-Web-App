<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>Age Calculator</h1>
        <p id="result"></p>
        <form>
            <label for="name">Name:</label>
            <input type="text" id ="name" name="name"><br><br>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age"><br><br>
            <input type="button" value="Calculate" onclick="calculateAge()"></button>
        </form>
        <script src="ageCalculator.js"></script>
    </body>
</html>