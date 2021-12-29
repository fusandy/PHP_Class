<?php

    $ar = [
        "name" => "李小明",
        "age" => 19,
    ];

    // echo json_encode($ar);
    echo json_encode($ar, JSON_UNESCAPED_UNICODE);


?>