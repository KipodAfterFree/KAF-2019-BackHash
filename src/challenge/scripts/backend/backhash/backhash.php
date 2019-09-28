<?php

include_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base" . DIRECTORY_SEPARATOR . "api.php";

const FLAG = "KAF{Dn4k_f1a9z___much_f1a9_l0t5_h4ppy}";

api("backhash", function ($action, $parameters) {
    if ($action === "generate") {
        if (isset($parameters->input)) {
            $input = $parameters->input;
            if (empty($input)) {
                return [false, "Input must not be empty"];
            } else {
                $algorithm = strlen($input) % 3;
                $output = "Failed?";
                switch ($algorithm) {
                    case 0:
                        $output = md5($input);
                        break;
                    case 1:
                        $output = md5(sha1($input));
                        break;
                    case 2:
                        $output = md5(sha1(base64_encode($input)));
                        break;
                }
                return [true, str_replace("f1a9", FLAG, $output)];
            }
        }
    }
    return [false, "Some error"];
}, false);

echo json_encode($result);