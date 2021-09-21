<form method="POST">
  <input type="url" name="url" class="form-control" placeholder="https://www.helixs.id/"><br>
  <input type="submit"  name="submit" class="btn btn-round btn-dim btn-outline-success" value="submit">
</form>
<br>
<?php
if(isset($_POST['submit'])){
$url = htmlspecialchars($_POST['url']);
$get = file_get_contents("https://tools.helixs.id/API/wayback.php?url=$url");
$t =  json_decode($get,true);
?>


                    <table class="datatable-init table">
                        <thead>
                            <tr>
                                <th>History Date</th>
                                <th>Type</th>
                                <th>status</th>
                                <th>Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($t["result"] as $b){ ?>
                            <tr>
                                <td><?= $b['date']; ?></td>
                                <td><?= $b['mimeType']; ?></td>
                                <td><?= $b['statusCode']; ?></td>
                                <td><a href="<?= $b['link']; ?>">Click</a></td>
                            </tr><? } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>History Date</th>
                                <th>Type</th>
                                <th>status</th>
                                <th>Link</th>
                            </tr>
                        </tfoot>
                    </table>
                
<? } ?>
