<?php
    function counter() {
        $filename = "counter.txt";

        if (file_exists($filename)) { //Check if exists counter file, if so get the number and increase it by 1 and save it again
            $counter = (int)file_get_contents($filename) + 1;
            file_put_contents($filename, $counter);
        } else {
            $counter = 1;
            file_put_contents($filename, $counter);
        }

        return $counter;
    }

    $number = counter();

    require "views/index.view.php";
?>
