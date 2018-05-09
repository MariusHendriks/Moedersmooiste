<?php
session_start();
include_once('../../includes/connection.php');

if (isset($_SESSION['ingelogd'])) {
    if ($_SESSION['rank'] >= 1) {
        if (isset($_POST['title'])){
            $title = $_POST['title'];
            $order = $_POST['order'];
            $text = $_POST['text'];
            $photo = $_POST['photo'];
            $video = $_POST['video'];
            
            $queryContent = $PDO->prepare('INSERT INTO content(title, text, photo, video) VALUES(?, ?, ?, ?)');
            $queryContent->bindValue(1, $title);
            $queryContent->bindValue(2, !empty($text) ? $text : NULL, PDO::PARAM_STR);
            $queryContent->bindValue(3, !empty($photo) ? $photo : NULL, PDO::PARAM_STR);
            $queryContent->bindValue(4, !empty($video) ? $video : NULL, PDO::PARAM_STR);
            $queryContent->execute();
            
            if($queryContent->rowCount() ? true : false){
                $queryGetID = $PDO->prepare('SELECT id FROM content WHERE title = ?');
                $queryGetID->bindValue(1, $title);
                $queryGetID->execute();
                $f = $queryGetID->fetch();
                $ID = $f['id'];
                
                $queryModule = $PDO->prepare('INSERT INTO module(title, contentid, orders) VALUES(?, ?, ?)');
                $queryModule->bindValue(1, $title);
                $queryModule->bindValue(2, $ID);
                $queryModule->bindValue(3, $order);
                $queryModule->execute();
                
                if ($queryContent->rowCount() ? true : false){
                    $myfile = "../../modules/".$title.".php";
                    $handle = fopen($myfile, "w") or die($php_errormsg);
                    $var = "'".$title."'";
                    fwrite($handle, '<?php $query = $PDO->prepare("SELECT * FROM content WHERE title =?");$query->bindValue(1, '.$var.');$query->execute();$module = $query->fetchAll();?><section class="<?= $module[0]["title"]; ?>"><div class="sectionHeader"><h1><?= $module[0]["title"]; ?></h1></div><div class="sectionContent"><p><?= $module[0]["text"]; ?></p></div></section>');
                    fclose($handle);
                    
                    echo("success");
                }
                else {
                    echo("Er ging iets fout");
                }
            }
            else {
                echo("Er ging iets fout");
            }
        }
        else {
            $query = $PDO->prepare('SELECT DISTINCT orders FROM module ORDER BY orders DESC');
            $query->execute();
            $result = $query->fetch();
            $highestOrder = $result['orders'];
            $highestOrder++;
?>
<main>
    <div class="gridHeader">
        <h1>Toevoegen</h1>
    </div>
    <div class="gridContent adminContent">
        <h3>Modules toevoegen</h3>
        <form autocomplete="off" class="gridForm">
            <input type="hidden" name="order" id="order" value="<?= $highestOrder; ?>">
            <p class="titleP">Titel:</p>
            <input type="text" name="title" id="title" class="title" placeholder="Titel" required>
            <p class="tekstP">Tekst:</p>
            <textarea name="tekst" id="tekst" class="tekst" placeholder="Tekst"></textarea>
            <p class="fotoP">Foto:</p>
            <input type="text" name="foto" id="foto" class="foto" placeholder="Mogelijke foto">
            <p class="videoP">Video:</p>
            <input type="text" name="video" id="video" class="video" placeholder="Mogelijke video">
            <input type="submit" name="submit" id="submit" class="submit" value="Toevoegen">
        </form>
        <script>
            $("#submit").on("click", function(){
                $.ajax({
                    type: "POST",
                    url: "pages/toevoegen",
                    data: {
                        title: $("#title").val(),
                        text: $("#tekst").val(),
                        photo: $("#foto").val(),
                        video: $("#video").val(),
                        order: $("#order").val()
                    },
                    cache: false,
                    success: function(result){
                        if(result === "success"){
                            alert("Module is toegevoegd!");
                            $("#content").hide("slide", { direction: "left" }, 500);
                            setTimeout(function(){
                                $("#content").load("/Moedersmooiste/admin/pages/dashboard").show("slide", { direction: "left" }, 500);
                            }, 500);
                        }
                        else {
                            alert(result);
                        }
                    }
                });
                return false;
            });
        </script>
    </div>
</main>
<?php
        }
    }
    else {
        ?>
        <h1 class="nicetry">Nice try!</h1>
        <?php
    }
}
else {
    header('Location: ../../login');
    exit();
}
?>