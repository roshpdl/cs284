<!DOCTYPE html>

<html lang=en>
    <head>
        <title>Feb 6 HW</title>
        <style>
		table, td {
			border: 1px solid black;
			border-collapse: collapse;
            text-align: left;
            text-transform: capitalize;
            padding: 20px;
            background-color: aliceblue;
		}
        
        tr td:nth-child(odd) {
            background-color: lightgray;
        }

        tr:nth-child(1) {
            font-weight: bold;
            font-family: 'Times New Roman', Times, serif;
        }
	</style>
    </head>
    <body>
        <div>
            <table>
                <tr>
                    <td>Name</td>
                    <td>Age</td>
                    <td>Weight</td>
                    <td>Breed</td>
                    <td>Toys</td>
                </tr>
                <?php
                $dogs = array(
                    'rover' => array('age' => 9, 'weight'=> 45, 'breed'=>'mix', 'toys'=>array('squeaky thing', 'stuffed octopus')),
                    'spot' => array('age' => 2, 'weight'=> 12, 'breed'=>'spaniel', 'toys'=>array('bone', 'cat', 'ball')),
                    'rocket' => array('age' => 4, 'weight'=> 55, 'breed'=>'bassett hound', 'toys'=>array('dinosaur')),
                    'astra' => array('age' => 3, 'weight'=> 35, 'breed'=>'golden retriever', 'toys' =>array('stuffed alien', 'socks')),
                    'bee'  => array('age' => 6, 'weight'=> 72, 'breed'=>'german shepherd', 'toys' =>array('ropes', 'frisbee', 'empty boxes')),
                );
                $dog_names = array_keys($dogs);
                foreach ($dog_names as $name) {
                    $info = $dogs[$name];
                    print "<tr>";
                    print "<td>" . $name . '</td>';
                    print "<td>" . $info['age'] . '</td>';
                    print "<td>" . $info['weight'] . '</td>';
                    print "<td>" . $info['breed'] . '</td>';
                    print "<td>";
                        foreach ($info['toys'] as $toy) {
                            print $toy . "<br>";
                        }
                    print "</td>";
                    print "</tr>";
                }
                ?>
            </table>
        </div>
    </body>
</html>