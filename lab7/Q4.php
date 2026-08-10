<!DOCTYPE html>
<html>
<head>
    <style>
         table{
                border-collapse: collapse;
                margin: auto;
                background-color: white;
            }

            caption{
                caption-side: top;
                font-style: italic;
                font-size: 20px;
                margin-bottom: 10px;
            }

            th, td{
                border: 1px solid #ccc;
                padding: 10px;
                text-align: center;
            }

            th{
                background-color: red;
                color: white;
            }

            tbody{
                color: black;
            }

            tbody tr:nth-child(odd){
                background-color: white;
            }

            tbody tr:nth-child(even){
                background-color: lightgray;
            }

            tbody tr:last-child{
                border-bottom: 3px solid red;
            }
    </style>
</head>
<body>
    <?php
    $contacts = [
        [
            'name' => 'Chia Kim Hooi',
            'phone' => '+60124044404',
            'email' => 'chiakh@duck.com',
            'facebook' => 'xyz.chiakh',
        ],
        [
            'name' => 'Chan Xiao Hui',
            'phone' => '+60125785678',
            'email' => 'chanxh@pingguo.com',
            'facebook' => 'pqr.chanxh',
        ],
        [
            'name' => 'Tan Chin Tiong',
            'phone' => '+60193163616',
            'email' => 'tanct@burungtiong.com',
            'facebook' => 'abc.tanct',
        ],
        [
            'name' => 'Foo Yoke Wai',
            'phone' => '+60125575552',
            'email' => 'fooyw@chicken.com',
            'facebook' => 'ijk.fooyw',
        ],
        [
            'name' => 'Ho Xin Yi',
            'phone' => '+60195889776',
            'email' => 'hoxy@myna.com',
            'facebook' => 'mno.hoxy',
        ]
    ];

    echo "<table>";

    $header = ["No", "Name", "Phone", "Email", "Facebook"];
    echo "<thead></tr>";
    foreach($header as $value){
        echo "<th>" . htmlspecialchars($value) . "</th>";
    }

    echo "</thead></tr>";

    echo "<tbody>";
    for ($i = 0 ; $i < count($contacts); $i++){
        echo "<tr>";
        echo "<td>" . $i+1 . ".</td>";
        echo "<td>" . htmlspecialchars($contacts[$i]["name"]) ."</td>";
        echo "<td>" . htmlspecialchars($contacts[$i]["phone"]) ."</td>";
        echo "<td><a href='mailto:" . htmlspecialchars($contacts[$i]["email"]) ."'>" . htmlspecialchars($contacts[$i]["email"]) . "</a></td>";
        echo "<td><a href='https://www.facebook.com/" . htmlspecialchars($contacts[$i]["name"]) ."'>" . htmlspecialchars($contacts[$i]["name"]) . "</a></td>";
        echo "</tr>";
    }

    echo "</tbody></table>";

    ?>
</body>
</html>