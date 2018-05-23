<?php

if (isset($_POST['sendContact'])) {
    function isEmpty($value) {
        $strTemp = $value;
        $strTemp = trim($strTemp);
        
        if($strTemp == ""){
            return true;
        }
        return false;
    }
    
    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $onderwerp = $_POST['onderwerp'];
    $bericht = $_POST['bericht'];
    $noErrors = true;
    
    
    if(isEmpty($naam)){
        echo("Geen naam ingevoerd!");
        $noErrors = false;
    }
    if(isEmpty($email)){
        echo("Geen email ingevoerd!");
        $noErrors = false;
    }
    if(isEmpty($onderwerp)){
        echo("Geen onderwerp ingevoerd!");
        $noErrors = false;
    }
    if(isEmpty($bericht)){
        echo("Geen bericht ingevoerd!");
        $noErrors = false;
    }
    if($email && filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        echo("Ingevoerde email is niet geldig!");
        $noErrors = false;
    }
    
    if($noErrors === true){
        $emailTo = "";
        $headers = "From: " . $email . "(" . $naam . ")";

        if (mail($emailTo, $onderwerp, $bericht, $headers)) {
            echo("Je bericht is verzonden! We komen zo spoedig mogelijk bij je terug!");
        }
        else {
            echo("Het bericht kon niet verzonden worden. Probeer het later nog eens!");
        }
    }
}
else {
    $query = $PDO->prepare("SELECT * FROM content WHERE title = 'contact'");
    $query->execute();
    $module = $query->fetchAll();
?>
<section class="<?= $module[0]['title']; ?>">
    <div class="sectionHeader">
        <h1><?= $module[0]['title']; ?></h1>
    </div>
    <div class="sectionContent">
        <p style="margin-left: 9%;"><?= $module[0]['text']; ?></p>
        <form method="post" id="contactForm">
            <div class="contact-left">
                <fieldset>
                    <label for="name">Naam: *</label>
                    <input type="text" name="name" placeholder="Naam" class="name" required>
                </fieldset>
                <fieldset>
                    <label for="email">Email: *</label>
                    <input type="email" name="email" placeholder="Email" class="email" required>
                </fieldset>
            </div>
            <div class="contact-right">
                <fieldset>
                    <label for="subject">Onderwerp: *</label>
                    <input type="text" name="subject" placeholder="Onderwerp" class="subject" required>
                </fieldset>
                <fieldset>
                    <label for="message">Je bericht: *</label>
                    <textarea name="content" rows="5" cols="20" class="bericht" placeholder="Typ hier je bericht..." required></textarea>
                </fieldset>
                <input type="submit" name="button" class="submit" value="Verzenden" />
            </div>
        </form>
        <script>
            $("#contactForm").submit(function(e){
                e.preventDefault();
                
                $.ajax({
                    type: "POST",
                    url: "/Moedersmooiste/modules/contact",
                    data: {
                        sendContact: "Y",
                        naam: $(".name").val(),
                        email: $(".email").val(),
                        onderwerp: $(".subject").val(),
                        bericht: $(".bericht").val()
                    },
                    cache: false,
                    success: function(result){
                        if(result == "Je bericht is verzonden! We komen zo spoedig mogelijk bij je terug!") {
                            alert(result);
                            window.location = "/Moedersmooiste/";
                        }
                        else {
                            alert(result);
                        }
                    }
                });
            });
        </script>
    </div>
</section>
<?php   
}
?>