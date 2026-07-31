<html lang="en">
<head>
    <title>To-Do List</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }

        .containter{
            width: 300px;
        }

        ul{
            list-style-type: none;
            padding: 0;
        }

        li{
            background: #f4f4f4;
            padding: 10px;
            margin: 5px 0;
            display: flex;
            justify-content:space-between;
            align-items: center;
            cursor: pointer;
            transition: 0.3s;
        }

        .completed{
            text-decoration: line-through;
            color: gray;
            opacity: 0.6;
        }

        .delete-btn{
            background: red;
            color: white;
            border: none;
            padding: 5px 8px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <input type="text" id="taskInput" placeholder="Add a task">
        <button onclick="addTask()">Add</button>
        <ul id="taskList"></ul>
    </div>


    <script>
        function addTask(){
            let taskInput = document.getElementById("taskInput");
            let taskText = taskInput.value.trim();
            if (taskText === "") return;

            // li List here
            let li = document.createElement('li');
            li.textContent = taskText;
            li.onclick = function () {
                this.classList.toggle("completed");
            }

            // Delete Button here
            let deleteBtn = document.createElement("button");
            deleteBtn.textContent = "X";
            deleteBtn.classList.add("delete-btn");

            li.appendChild(deleteBtn);
            document.getElementById("taskList").appendChild(li);
            taskInput.value = "";

            deleteBtn.onclick = function (event) {
                 /**
                 * onlick will trigger both parent and child, if child is clicked, 
                 * stopPropagation is to stop the parent from activiating the onclick
                 */
                event.stopPropagation(); // Prevent triggerring the li click event 
                this.parentElement.remove();
            };
        }
    </script>
</body>
</html>