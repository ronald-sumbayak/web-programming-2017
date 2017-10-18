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
                ><?php
                if ($_POST && isset ($_POST['load'])) {
                    $note = fopen ("note.txt", 'r');
                    echo fread ($note, filesize ("note.txt"));
                    fclose ($note);
                }
//                else if (file_exists ("note.txt")) {
//                    $note = fopen ("note.txt", 'r');
//                    echo fread ($note, filesize ("note.txt"));
//                    fclose ($note);
//                }
            ?></textarea>
            <input type="submit" name="save" value="Save">
            <input type="submit" name="load" value="Load">
        </form>
    </body>
</html>

<?php
if ($_POST) {
    if (isset ($_POST['save'])) {
        $note = fopen ("note.txt", "w");
        fwrite ($note, htmlspecialchars ($_POST['note']));
        fclose ($note);
    }
}
?>