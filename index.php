<!DOCTYPE html>
<html>
<style>
.conteiner {
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	}
</style>

<form class="conteiner" method="POST" action="index.php">
	<input name="username" type="text" placeholder="enter your name" required>
	<br>
	<input name="email" type="email" placeholder="enter your email" required>
	<br>
	<textarea name="message" rows="3" placeholder="type your message" required></textarea>
	<br>
	<input type="submit" value="Send"/>
</form>

<hr>

<?php
$host="localhost";
$pass="";
$username="root";
$dbname="messages_db";
$link  = mysqli_connect($host, $username, $pass, $dbname);


$name = $_POST['username'];
$email = $_POST['email'];
$text = $_POST['message'];

$query = 'insert into messages (username, email, message) values ("'.$name.'","'.$email.'","'.$text.'")';
$insert_user_query = mysqli_query( $link, $query);

$db_query = 'SELECT * FROM `messages` ORDER BY `messages`.`create_date_message` DESC';
$_messages = mysqli_query($link, $db_query);

$messages_array = mysqli_fetch_all($_messages, MYSQLI_ASSOC);

foreach ($messages_array as $message) {
	$message_list.= $message['username'].' '.$message['email'].' '.$message['message'].' '.$message['create_date_message'].'<br>';
}
echo $message_list;
?>
</html>
