<?php
include 'functions.php';
session_start();

if (isset($_GET['id'])) {
    echo 'id = ' . $_GET['id'];
    echo 'value = ' . $_GET['value'];
}

if (isset($_POST['reset'])) {
    unset($_SESSION['board']);
    unset($_POST['reset']);
}
// Rank - the eight horizontal rows of the chess board are called ranks.
// File - the eight vertical columns of the chess board are called files.
// Diagonal - a straight line of squares of the same color running at an angle from one edge of the board to another edge is called a diagonal.

for ($Ranks = 0; $Ranks < 8; $Ranks++) {
    for ($files = 0; $files < 8; $files++) {
        $value = setValue($Ranks, $files);
        $board[$Ranks][$files] = $value;
    }
}

// if (!isset($_SESSION['board'])) {
//     $_SESSION['board'] = $board;
// } else {
//     $board = $_SESSION['board'];

//     $previousClick = $_COOKIE['previous-click'];
//     $previousItem = $_COOKIE['previous-item'];

//     $newClick = $_COOKIE['new-click'];
//     $newItem = $_COOKIE['new-item'];

//     setcookie('previous-click', $newClick);
//     setcookie('previous-item', $newItem);
//     setcookie('new-click', null);
//     setcookie('new-item', null);

//     $newClick = str_split($newClick);
//     $i = $newClick[0];
//     $j = $newClick[1];

//     $board[$i][$j] = $item;

// echo '<pre>';
// print_r($board);
// print_r($item);
// }
$_SESSION['board'] = $board;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chase Board</title>
    <style>
        .cell {
            cursor: pointer;
            text-decoration: none;
            padding: 30px 30px;
        }

        td {
            text-align: center;
        }

        img {
            height: 60px;
            padding: 5px;
        }

        .not-piece {
            padding: 26px 35px;
        }

        .piece {
            padding: 56px 0px 1px 0px;
        }
    </style>
</head>

<body>
    <center>
        <form action="./" method="post">
            <input type="submit" value="reset" name="reset">
        </form>
        <table border="20" cellpadding="0" cellspacing="0">
            <?php
            for ($i = 0; $i < 8; $i++) {
                echo "<tr>";
                for ($j = 0; $j < 8; $j++) {
                    $id = $i . $j;
                    $bgcolor = setBgcolor($i, $j);
                    if ($board[$i][$j]) {
                        echo '<td><a class="piece" href="?id=' . $id . '&value=' . $board[$i][$j] . '" style="background-color: ' . $bgcolor . ';"><img src="images/' . $board[$i][$j] . '.png" alt="' . $board[$i][$j] . '"></a></td>';
                    } else {
                        echo '<td><a class="not-piece" href="?id=' . $id . '&value=0" style="background-color: ' . $bgcolor . '; "></a></td>';
                    }
                    // echo '<td><button id="' . $id . '"    onclick="select(id)">' . $board[$i][$j] . '</button></td>';
                    // echo '<td><form action=""><input type="submit" id="' . $id . '" class="cell" style="background-color: ' . $bgcolor . ';  background: url('.$value.');"   onclick="fun(id)"></input></form></td>';
                }
                echo "<td style='width: 25px; font-size: 60px;'>" . $i . "</td>";
                echo "</tr>";
            }
            echo "<tr>";
            $files = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
            for ($i = 0; $i < 8; $i++) {
                echo "<td style='width: 25px; font-size: 40px;'>" . $files[$i] . "</td>";
            }
            echo "</tr>";
            ?>
        </table>
    </center>
</body>

</html>