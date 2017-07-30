<?php
    /**
     * Function for increasing visiting counter.
     */
    function counter() {
        $filename = "counter.txt";

        if (file_exists($filename)) {
            //Check if exists counter file, if so get the number and increase it by 1 and save it again
            $data = preg_split("/[\s]+/", file_get_contents($filename));
            $counter = (int)$data[1] + 1;
            file_put_contents($filename, "Counter: " . $counter);
        } else {
            $counter = 1;
            file_put_contents($filename, "Counter: " . $counter);
        }

        return $counter;
    }

    $number = counter();

    require "views/index.view.php";
?>
