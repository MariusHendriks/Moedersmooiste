<?php

$error = "";
$successMessage = "";

if ($_POST) {
    if (!$_POST["email"]) {
        $error .= "An email address is required.<br>";
    }
    
    if (!$_POST["content"]) {
        $error .= "The content field is required.<br>";
    }
    
    if (!$_POST["subject"]) {
        $error .= "The subject is required.<br>";
    }
    
    if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
        $error .= "The email address is invalid.<br>";
    }
    
    if ($error != "") {
        $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
    }
    else {
        $emailTo = "dylano.hartman@gmail.com";
        $subject = $_POST['subject'];
        $content = $_POST['content'];
        $headers = "From: ".$_POST['email'];
        
        if (mail($emailTo, $subject, $content, $headers)) {
            $successMessage = '<div class="success" role="alert">Your message was sent, we\'ll get back to you ASAP!</div>';
        }
        else {
            $error = '<div class="error" role="alert"><p><strong>Your message couldn\'t be sent - please try again later</div>';
        }
    }
}
?>

<div class="sectionHeader">
    <h1>CONTACT</h1>
</div>
<div class="sectionContent">
    <p>Neem contact met ons op!</p>

    <div id="error"><?php echo $error; ?></div>
    <form method="post">
        <div class="contact-left">
            <fieldset>
                <label for="name">Naam:</label>
                <input type="text" name="name" placeholder="naam" class="name">
            </fieldset>
            <fieldset>
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="mail" class="email">
            </fieldset>
        </div>
        <div class="contact-right">
            <fieldset>
                <label for="subject">Onderwerp:</label>
                <input type="text" name="subject" placeholder="subject" class="subject">
            </fieldset>
            <fieldset>
                <label for="message">Je bericht:</label>
                <textarea name="content" rows="8" cols="80" class="content"></textarea>
            </fieldset>
            <button type="submit" name="button" class="submit">Verzenden</button>
        </div>
    </form>
</div>