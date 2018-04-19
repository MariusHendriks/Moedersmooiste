<?php

$error = "";
$successMessage = "";

if ($_POST) {
    if (!$_POST["email"]) {
        $error .= "Een email address is verplicht.<br>";
    }

    if (!$_POST["content"]) {
        $error .= "Het berichten veld moet ingevuld zijn.<br>";
    }

    if (!$_POST["subject"]) {
        $error .= "Een onderwerp is verplicht.<br>";
    }

    if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
        $error .= "Het ingevulde email address is niet geldig.<br>";
    }

    if ($error != "") {
        $error = 'Er waren 1 of meer fouten in het contact veld. Probeer het nog een keer! <br />' . $error;
    }
    else {
        $emailTo = "";
        $subject = $_POST['subject'];
        $content = $_POST['content'];
        $headers = "From: ".$_POST['email'];

        if (mail($emailTo, $subject, $content, $headers)) {
            $successMessage = 'Je bericht is verzonden. We komen zo spoedig mogenlijk bij je terug!';
        }
        else {
            $error = '<strong>Je bericht kon niet verzonden worden. Probeer het later nog eens!';
        }
    }
}
?>

<div class="sectionHeader">
    <h1>CONTACT</h1>
</div>
<div class="sectionContent">
    <p>Neem contact met ons op!</p>


    <form method="post">
        <div class="contact-left">
            <fieldset>
                <label for="name">Naam:<br /></label>
                <input type="text" name="name" placeholder="naam" class="name">
            </fieldset>
            <fieldset>
                <label for="email">Email:<br /></label>
                <input type="email" name="email" placeholder="mail" class="email">
            </fieldset>
        </div>
        <div class="contact-right">
            <fieldset>
                <label for="subject">Onderwerp:<br /></label>
                <input type="text" name="subject" placeholder="onderwerp" class="subject">
            </fieldset>
            <fieldset>
                <label for="message">Je bericht:<br /></label>
                <textarea name="content" rows="8" cols="20" class="bericht"></textarea>
            </fieldset>
            <button type="submit" name="button" class="submit">Verzenden</button>
        </div>
    </form>

    <p><?php echo $error; ?></p>
</div>
