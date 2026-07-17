<!DOCTYPE html>
<html>
    <head>
        <title>Lab 4</title>
    </head>
    <body>
        <h1>You are at task 2</h1>
        <nav>
            <ul>
                <li><a href="task3-1.php">Go to task 3-1</a></li>
                <li><a href="task3-2.php">Go to task 3-2</a></li>
                <li><a href="task3-3.php">Go to task 3-3</a></li>
                <li><a href="task3-4.php">Go to task 3-4</a></li>
                <li><a href="task3-5.php">Go to task 3-5</a></li>
            </ul>
        </nav>

        <p>look at the console</p>
        <script>
            // Q1
            const numbers = [75.43, 18.76, 99.41, 18.78, 74.53, 86.81, 23.51, 66.17];

            // Q2
            let sum = 0;
            numbers.forEach( number => {
                sum += number;
            })
            const average = sum / numbers.length;
            console.log(`The sum is ${sum}`);
            console.log(`The average is ${average}`);

            // Q3
            numbers.forEach( number => {
                number * 0.8683;
            });
            console.log(`The new values of the numbers array are: ${numbers}`);

            // Q4
            const customer = {
                id: "P8681",
                name: "Foo Yoke Kai",
                email: "fooyokekai@gmel.my",
                phone: "+60123456789",
                address: "313 Jalan Burung Tiong, 52100 Kuala Lumpur"
            };

            // Q5
            for (let property in customer){
                console.log(`${property} : ${customer[property]}`);
            }

            // Q6
            const customers = [
                {id:"P8680", name:"Adam", email:"adam@gmel.my", phone:"+60000456789", address: "312 Jalan Burung Tiong, 52100 Kuala Lumpur"},
                {id:"P8682", name:"Alice", email:"alice@gmel.my", phone:"+60223456789", address: "314 Jalan Burung Tiong, 52100 Kuala Lumpur"},
                {id:"P8683", name:"Bob", email:"alice@gmel.my", phone:"+60323456789", address: "315 Jalan Burung Tiong, 52100 Kuala Lumpur"},
                {id:"P8684", name:"Charlie", email:"Charlie@gmel.my", phone:"+60423456789", address: "316 Jalan Burung Tiong, 52100 Kuala Lumpur"},
                {id:"P8685", name:"Danny", email:"Danny@gmel.my", phone:"+60523456789", address: "317 Jalan Burung Tiong, 52100 Kuala Lumpur"},
            ];
            

            // console.log("Customers array:");
            // customers.forEach(customer => {
            //     console.log(customer);
            // })

            let i = 1;
            customers.forEach( customer => {
                console.log(`Customer ${i}:`)
                for (let property in customer){
                    console.log(`${property} : ${customer[property]}`);
                }
                console.log("-----------------------------------");
            });
        </script>
    </body>
</html>

