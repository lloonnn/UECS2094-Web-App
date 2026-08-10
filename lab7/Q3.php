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
    $parking = [
        [
            'vehicleNo' => 'WYR9941',
            'driver' => 'Tham Mun Fatt',
            'block' => 'E',
            'floor' => '2',
            'bay' => 11,
        ],
        [
            'vehicleNo' => 'PKC7453',
            'driver' => 'Chia Kim Hooi',
            'block' => 'C',
            'floor' => '3A',
            'bay' => 15,
        ],
        [
            'vehicleNo' => 'WC852E',
            'driver' => 'Ho Jo Ee',
            'block' => 'E',
            'floor' => 'G',
            'bay' => 34,
        ],
        [
            'vehicleNo' => 'AGP8681',
            'driver' => 'Foo Yoke Wai',
            'block' => 'C',
            'floor' => '3A',
            'bay' => 19,
        ],
        [
            'vehicleNo' => 'WA1368Y',
            'driver' => 'Wong Pei Lin',
            'block' => 'A',
            'floor' => '1',
            'bay' => 1,
        ],
    ];

    echo "<table><caption><i>Praking Bay Allocation at Pusat Dagangan Burung Tiong</i></caption>";

    $header = ["Vechicle No", "Driver", "Block", "Floor", "Bay No."];
    echo "<thead></tr>";
    foreach($header as $value){
        echo "<th>" . htmlspecialchars($value) . "</th>";
    }

    echo "</tr></thead>";

    echo "<tbody>";
    foreach($parking as $element){
        echo "<tr>";
        foreach($element as $key => $value){
            echo "<td>". htmlspecialchars($value) ."</td>";
        }
        echo "</tr>";
    }

    echo "</tbody></table>";

    ?>

</body>
</html>
