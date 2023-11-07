<?php

require("../model/nuevoTweetDAO.php");
$nuevoTweet = $_POST['nuevo_tweet'];

nuevoTweet($pdo, $nuevoTweet);

?>
