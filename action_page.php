<?php
session_start();
if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
		$_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
	}
	else{
		echo '<span class="error">Please type in a name</span>';
	}
}
function loginForm(){
	echo' 
<div id="loginform"> 
<p>Please enter your name to continue!</p> 
<form action="index.php" method="post"> 
<label for="name">Name &mdash;</label> 
<input type="text" name="name" id="name" /> 
<input type="submit" name="enter" id="enter" value="Enter" /> 
</form> 
</div> 
';
}
?>
<?php
if(!isset($_SESSION['name'])){
	loginForm();
}
else{
?>
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
        <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
    </div>
    <div id="chatbox">
    <?php
    if(file_exists("log.html") && filesize("log.html") > 0){
        
        $contents = file_get_contents("log.html");
        echo $contents;
    }
    ?>
    </div>
    <form name="message" action="">
        <input name="usermsg" type="text" id="usermsg" />
        <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
    </form>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document 
$(document).ready(function(){
});
</script>
<?php
}
?>
