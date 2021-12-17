<html>

<head>
    <title>test</title>
</head>

<body>
    <?php
    $uploadDir = 'uploads/'; if(isset($_POST['upload'])) {
        $fileName = $_FILES['userfile']['name']; $tmpName = $_FILES['userfile']['tmp_name']; $fileSize = $_FILES['userfile']['size']; $fileType = $_FILES['userfile']['type'];
        $filePath = $uploadDir . $fileName;
        $result = move_uploaded_file($tmpName, $filePath); if (!$result) { echo "Error uploading file"; $filePath="uploads/no_images.jpeg"; }
        if(!get_magic_quotes_gpc()) { $fileName = addslashes($fileName); $filePath = addslashes($filePath); }
        $query = "update table set path='$filePath' where user_id='$user_id'";//change query according to you
        mysql_query($query) or die('Error, query failed'); $path=$filePath; echo "<br>File $fileName uploaded<br>";}
    ?>
    <table width="99%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <th width="5%" height="62" scope="col">&nbsp;</th>
            <th width="51%" align="left" valign="top" scope="col">
                <form name="form2" method="post" action="aaa.php">

                    <img src="<?php echo $path ?>" height="150" width="150" />
                </form>
            </th>
            <th width="44%" align="left" valign="top" scope="col">
                <form action="aaa.php" method="POST" enctype="multipart/form-data">
                    <p>
                        <br />
                        <font size="1"></font><br />
                    </p>

                    <table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
                        <tr>
                            <td width="246">
                                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                                <input name="userfile" type="file" id="userfile" />
                            </td>
                            <td width="80">
                                <input name="upload" type="submit" class="box" id="upload" value=" Upload " />
                            </td>
                        </tr>
                    </table>
                    <p><br /></p>
                </form>
            </th>
        </tr>
    </table>
</body>

</html>