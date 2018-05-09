<?php
session_start();
include_once('../../includes/connection.php');

if (isset($_SESSION['ingelogd'])) {
    if ($_SESSION['rank'] >= 1) {
        if (isset($_POST['title'])){
            $title = $_POST['title'];
            $text = $_POST['text'];
            $photo = $_POST['photo'];
            $video = $_POST['video'];
            
            $query = $PDO->prepare('UPDATE content SET title = ?, text = ?, photo = ?, video = ? WHERE title = ?');
            $query->bindValue(1, $title);
            $query->bindValue(2, !empty($text) ? $text : NULL, PDO::PARAM_STR);
            $query->bindValue(3, !empty($photo) ? $photo : NULL, PDO::PARAM_STR);
            $query->bindValue(4, !empty($video) ? $video : NULL, PDO::PARAM_STR);
            $query->bindValue(5, $title);
            $query->execute();
            
            if($query->rowCount() ? true : false){
                echo("success");
            }
            else {
                echo("Er ging iets fout");
            }
        }
        else if (isset($_POST['id'])){
            $query = $PDO->prepare('SELECT * FROM content WHERE id = ?');
            $query->bindValue(1, $_POST['id']);
            $query->execute();
            $result = $query->fetchAll();
            echo json_encode($result);
        }
        else {
            $query = $PDO->prepare('SELECT * FROM content');
            $query->execute();
            $result = $query->fetchAll();
?>
<main>
    <div class="gridHeader">
        <h1>Wijzigen</h1>
    </div>
    <div class="gridContent adminContent">
        <h3>Modules Wijzigen</h3>
        <form autocomplete="off" class="dropDownForm">
            <select required name="id" id="id">
                <option value="none" selected>Kies een module om te wijzigen</option>
                <?php
                    foreach($result as $content){
                ?>
                        <option value="<?= $content[0]; ?>"><?= $content[1]; ?></option>
                <?php
                    }
                ?>
            </select>
            <input type="submit" name="submit" id="submitDD" class="submit" value="Laad">
        </form>
        <form autocomplete="off" class="gridForm" style="display: none;">
            <p class="titleP">Titel:</p>
            <input type="text" name="title" id="title" class="title" placeholder="Titel" required disabled>
            <p class="tekstP">Tekst:</p>
            <textarea name="tekst" id="tekst" class="tekst" placeholder="Tekst"></textarea>
            <p class="fotoP">Foto:</p>
            <input type="text" name="foto" id="foto" class="foto" placeholder="Mogelijke foto">
            <p class="videoP">Video:</p>
            <input type="text" name="video" id="video" class="video" placeholder="Mogelijke video">
            <input type="submit" name="submit" id="submit" class="submit" value="Wijzigen">
        </form>
        <script>
            $("#submitDD").on("click", function(){
                $.ajax({
                    type: "POST",
                    url: "pages/wijzigen",
                    data: {
                        id: $("#id").val()
                    },
                    cache: false,
                    success: function(result){
                        var data = JSON.parse(result);
                        console.log(data);
                        
                        $("#title").val(data[0][1]);
                        $("#tekst").val(data[0][2]);
                        $("#foto").val(data[0][3]);
                        $("#video").val(data[0][4]);
                        
                        $(".dropDownForm").fadeOut(500);
                        setTimeout(function(){$(".gridForm").fadeIn(500);}, 500);
                    }
                });
                return false;
            });
            
            $("#submit").on("click", function(){
                $.ajax({
                    type: "POST",
                    url: "pages/wijzigen",
                    data: {
                        title: $("#title").val(),
                        text: $("#tekst").val(),
                        photo: $("#foto").val(),
                        video: $("#video").val()
                    },
                    cache: false,
                    success: function(result){
                        if(result === "success"){
                            alert("Module is gewijzigd!");
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