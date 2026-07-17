<!DOCTYPE html>
<html>
    <head>
        <title>Task 3</title>
    </head>
    <body>
        <h1>You are at task 3-2</h1>
        <nav>
            <ul>
                <li><a href="task2.php">Go to task 2</a></li>
                <li><a href="task3-1.php">Go to task 3-1</a></li>
                <li><a href="task3-3.php">Go to task 3-3</a></li>
                <li><a href="task3-4.php">Go to task 3-4</a></li>
                <li><a href="task3-5.php">Go to task 3-5</a></li>
            </ul>
        </nav>
        
        <div id="wrapper"></div>
        <script>
            const wrapper = document.getElementById("wrapper");

            // Q2
            var properties = [
                {
                    unitNo: "C-8-1",
                    owner: "Foo Yoke Wai"
                },
                {
                    unitNo: "C-3A-3A",
                    owner: "Chia Kim Hooi"
                },
                {
                    unitNo: "B-18-8",
                    owner: "Heng Tee See"
                },
                {
                    unitNo: "A-10-10",
                    owner: "Tang So Ny"
                },
                {
                    unitNo: "B-19-10",
                    owner: "Tang Xiao Mi"
                },
            ];

            const ol = document.createElement("ol");
            properties.forEach( ({unitNo, owner}) => {
                let li = document.createElement("li");
                li.innerHTML = `${unitNo}: ${owner}`;
                ol.appendChild(li);
            });
            wrapper.appendChild(ol);

        </script>
    </body>
</html>