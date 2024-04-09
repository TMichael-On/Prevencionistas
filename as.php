<?php

function generate_jwt_secret($length = 16) {
    return bin2hex(random_bytes($length));
}

$jwt_secret = generate_jwt_secret();
echo "JWT_SECRET: " . $jwt_secret;

?>
