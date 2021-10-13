<?php
$result = ['result' => 'fail', 'message' => 'error when adding to database'];
if (!isset($_POST)) {
    $result = ['result' => 'fail', 'message' => 'wrong request'];
} elseif (!isset($_POST['email']) || !$_POST['email']) {
    $result = ['result' => 'fail', 'message' => 'no email'];
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $result = ['result' => 'fail', 'message' => 'wrong email'];

    //replace with checking add to database or whatever
} elseif (true) {
    $result = ['result' => 'success', 'message' => 'successfully sent'];
}
returnBackresult($result);




function returnBackresult($result) {
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        header('Content-type:application/json;charset=utf-8');
        echo json_encode($result);
        return;
    }
    //change it to your page
    header('Location: ' . '/simpleajax/?'.http_build_query($result));
}
