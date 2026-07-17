<!DOCTYPE html>
<html>
    <head>
        <title>Task 3</title>
    </head>
    <body>
        <h1>You are at task 3-4</h1>
        <nav>
            <ul>
                <li><a href="task2.php">Go to task 2</a></li>
                <li><a href="task3-1.php">Go to task 3-1</a></li>
                <li><a href="task3-2.php">Go to task 3-2</a></li>
                <li><a href="task3-3.php">Go to task 3-3</a></li>
                <li><a href="task3-5.php">Go to task 3-5</a></li>
            </ul>
        </nav>
        
        <div id="wrapper"></div>
        <script>
            const wrapper = document.getElementById("wrapper");

            // Q1
            var agents = [
                "Tham Mun Fatt",
                "Tan Chin Tiong",
                "Apple Tiong",
                "Tiong Na Na",
                "Sam Sung"
            ];

            const ul = document.createElement("ul");

            agents.forEach(agent => {
                let li = document.createElement("li");
                li.innerHTML = agent;
                li.style.color = "blue";
                ul.appendChild(li);
            })

            wrapper.appendChild(ul);

            // Q4
            var newAgents = [
                "Sim Su Yi",
                "Teh Seok Leng",
                "Lau Li Ting"
            ];

            newAgents.forEach( newAgent => {
                let li = document.createElement("li");
                li.innerHTML = newAgent;
                ul.insertBefore(li, ul.firstChild);
            })
        </script>
    </body>
</html>