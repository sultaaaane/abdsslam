<?php
if (isset($_GET['code'])) {
    // Save the authorization code in a secure location for future use
    file_put_contents('credentials.json', json_encode($_GET['code']));
    echo 'Authorization code saved successfully!';
} else {
    echo 'Authorization failed.';
}
?>
