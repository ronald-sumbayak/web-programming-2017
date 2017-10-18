<html>
    <head>
        <title>PPWEBB</title>
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
            <textarea
                name="note"
                cols="150"
                rows="25"
                style="resize:none;display:block"
                placeholder="Put description for the file"
                ></textarea>
            <input type="submit" name="save" value="Save">
        </form>
    </body>
</html>

<?php
if ($_POST) {
    $note = fopen ("note.txt", "w");
    fwrite ($note, htmlspecialchars ($_POST['note']));
    fclose ($note);
}
?>