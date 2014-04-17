<?php
     if(isset($_POST['message']) == false) {     //  If there's no message
        echo "Uh oh. Looks like you didn't actually include a message, friend.<br><br>";
        die();   
    }
    
    
    $destination = "your@email.com";       //  Put your email address here
    $subject = "Message from your baller website!";   //  Fill in the subject line you want your messages to have
    $fromAddress = "example@example.com";   //  Fill in the email address that you want the messages to appear to be from
                                                                    //  Use a real address to reduce the odds of getting spam-filtered.
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = str_replace("\n.", "\n..", $_POST['message']);   //  Prevents a new line starting with a period from being omitted

    $message = "Name: ". $name ."\nEmail: ". $email . "\nMessage: ".$message."\n";

$headers   = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/plain; charset=iso-8859-1";
$headers[] = "From: " . $fromAddress;
$headers[] = "Subject: " . $subject;
$headers[] = "X-Mailer: PHP/".phpversion();

mail($destination, $subject, $message, implode("\r\n", $headers));
 
?>

<p>It worked! Thanks for your message:<br>
<?php echo $message; ?>
 
<br>
<a href="/">Go back home</a>
