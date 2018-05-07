<?php
session_start();
include_once('../../includes/connection.php');

if (isset($_SESSION['ingelogd'])) {
    $query = $PDO->prepare('SELECT * FROM module ORDER BY orders ASC');
    $query->execute();
    $modules = $query->fetchAll();
?>
<main>
    <div class="gridHeader">
        <h1>Lijst</h1>
    </div>
    <div class="gridContent listContent">
        <table class="listTable">
            <thead>
                <tr>
                    <th class="titel">Titel</th>
                    <th class="order">Order</th>
                    <?php
                        if ($_SESSION['rank'] >= 1) {
                    ?>
                    <th></th>
                    <th></th>
                    <?php
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($modules as $module){
                ?>
                    <tr class="trModuleAll tr<?= $module['id']; ?>" id="<?= $module['orders']; ?>">
                        <td>
                            <?= $module['title']; ?>
                        </td>
                        <td class="tdModule tdModule<?= $module['id']; ?>">
                            <?= $module['orders']; ?>
                        </td>
                        <?php
                            if ($_SESSION['rank'] >= 1) {
                        ?>
                        <td>
                            <select id="select<?= $module['id']; ?>" name="select<?= $module['id']; ?>">
                                <?php 
                                switch ($module['orders']) {
                                    default:
                                    case 1:
                                ?>
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                <?php
                                    break;
                                    case 2:
                                ?>
                                    <option value="1">1</option>
                                    <option value="2" selected>2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                <?php 
                                    break;
                                    case 3:
                                ?>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3" selected>3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                <?php
                                    break;
                                    case 4:
                                ?>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4" selected>4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                <?php
                                    break;
                                    case 5:
                                ?>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5" selected>5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                <?php
                                    break;
                                    case 6:
                                ?>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6" selected>6</option>
                                    <option value="7">7</option>
                                <?php
                                    break;
                                    case 7:
                                ?>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7" selected>7</option>
                                <?php
                                    break;
                                } 
                                ?>
                            </select>
                        </td>
                        <td>
                            <button id="button<?= $module['id']; ?>" name="button<?= $module['id']; ?>">Verander</button>
                        </td>
                        <td>
                            <p class="errorText error<?= $module['id']; ?>"></p>
                        </td>
                        <?php
                            }
                        ?>
                        
                        <script>
                            $(document).ready(function(){
                                $("#button<?= $module['id']; ?>").on("click", function(){
                                    var newOrder = $("#select<?= $module['id']; ?>").find(":selected").val();
                                    var oldOrder = $(".tr<?= $module['id']; ?>").attr("id");
                                    
                                    $.ajax({
                                        type: "POST",
                                        url: "orderchange",
                                        data: {
                                            newOrder: newOrder,
                                            oldOrder: oldOrder,
                                            id: <?= $module['id']; ?>
                                        },
                                        cache: false,
                                        success: function(data){
                                            if (data === "1"){
                                                $("select").each(function(){
                                                    var value = $(this).find(":selected").val();
                                                    if (value === newOrder){
                                                        $(this).val(oldOrder);
                                                    }
                                                });
                                                
                                                $(".tdModule").each(function(){
                                                    var text = $(this).text();
                                                    text = text.replace(/\s/g, '');
                                                    if (text === newOrder){
                                                        $(this).text(oldOrder);
                                                    }
                                                });
                                                
                                                $(".tr<?= $module['id']; ?>").attr("id", newOrder);
                                                $(".tdModule<?= $module['id']; ?>").text(newOrder);
                                                $("#select<?= $module['id']; ?>").val(newOrder);
                                                
                                                $(".error<?= $module['id']; ?>").css({color: "black"}).text("Order van module veranderd naar " + newOrder);
                                                
                                                setTimeout(function(){
                                                    $(".error<?= $module['id']; ?>").text("");
                                                }, 2500);   
                                            }
                                            else {
                                                $(".error<?= $module['id']; ?>").css({color: "red"}).text("Order van module is al " + newOrder);
                                                
                                                setTimeout(function(){
                                                    $(".error<?= $module['id']; ?>").text("");
                                                }, 5000);
                                            }
                                        }
                                    });
                                });
                            });
                        </script>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</main>
<?php
}
else {
    header('Location: ../../login');
    exit();
}
?>