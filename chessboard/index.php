<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .chessboard {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            grid-template-rows: repeat(8, 1fr);
            width: 80vmin; /* Adjust the size as needed */
            height: 80vmin;
            gap: 1px;
        }

        .chessboard div {
            box-sizing: border-box;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5em;
        }

        .chessboard .white {
            background-color: #f0d9b5;
        }

        .chessboard .black {
            background-color: #b58863;
        }
    </style>
</head>
<body>
    <div class="chessboard">
        <!-- Loop to create the chessboard cells -->
        <?php
            $isWhite = true;
            for ($row = 1; $row <= 8; $row++) {
                for ($col = 1; $col <= 8; $col++) {
                    $class = $isWhite ? 'white' : 'black';
                    echo "<div class=".$class."></div>";
                    $isWhite = !$isWhite;
                }
                $isWhite = !$isWhite; // Change row color for the next row
            }
        ?>
    </div>
</body>
</html>
