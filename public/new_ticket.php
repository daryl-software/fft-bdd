<?php

$container = require_once __DIR__.'/../src/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $container['ticket-creation']->exec($_POST['name'], $_POST['description']);

    $_SESSION['new_ticket_notice'] = true;

    header('location: /ticket.php?name='.urlencode($_POST['name']), 303);
    exit;
}

?>
<!DOCTYPE html>
<h1>Ticket Creation</h1>
<form method="post">
    <label>
        name
        <input name="name"/>
    </label><br/>
    <label>
        description
        <textarea name="description"></textarea>
    </label>
    <input type="submit" value="Create ticket"/>
</form>
