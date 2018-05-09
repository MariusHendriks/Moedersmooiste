<?php
session_start();
include_once('../../includes/connection.php');

if (isset($_SESSION['ingelogd'])) {
    if ($_SESSION['rank'] >= 1) {
        if (isset($_POST['id'])){
            $id = $_POST['id'];
            $title = $_POST['title'];
            $queryContent = $PDO->prepare('DELETE FROM content WHERE id = ?');
            $queryContent->bindValue(1, $id);
            $queryContent->execute();
            
            if($queryContent->rowCount() ? true : false){
                $queryModule = $PDO->prepare('DELETE FROM module where contentid = ?');
                $queryModule->bindValue(1, $id);
                $queryModule->execute();
                
                if($queryModule->rowCount() ? true : false){
                    unlink("../../modules/".$title.".php");
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
            $query = $PDO->prepare('SELECT * FROM content');
            $query->execute();
            $content = $query->fetchAll();
?>
<main>
    <div class="gridHeader">
        <h1>Verwijderen</h1>
    </div>
    <div class="gridContent adminContent">
        <h3>Modules verwijderen</h3>
        <form autocomplete="off">
            <select required name="id" id="id">
                <option value="none" selected>Kies een module om te verwijderen</option>
                <?php
                    foreach($content as $module){
                ?>
                        <option value="<?= $module[0]; ?>"><?= $module[1]; ?></option>
                <?php
                    }
                ?>
            </select>
            <input type="submit" name="submit" id="submit" class="submit" value="Verwijderen">
        </form>
        <script>
            $("#submit").on("click", function(){
                $.ajax({
                    type: "POST",
                    url: "pages/verwijderen",
                    data: {
                        id: $("#id").val(),
                        title: $("select").find(":selected").text()
                    },
                    cache: false,
                    success: function(result){
                        if(result === "success"){
                            alert("Module is verwijderd!");
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