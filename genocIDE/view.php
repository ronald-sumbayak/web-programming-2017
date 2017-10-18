<?php
include ('checksession.php');
include ('dbconn.php');
$file = mysqli_query ($link, 'select * from files where id = "' . $_GET['file'] . '"');
$file = mysqli_fetch_assoc ($file);
?>

<!doctype html>
<html style="height:100%">
    <head>
        <title>GenocIDE - The world future greatest editor for all language</title>
        <script src="jquery-3.1.1.min.js"></script>
        <script src="scripts.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto"/>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.10.0/styles/default.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.10.0/highlight.min.js"></script>
        <script>
        hljs.tabReplace = '    ';
        hljs.initHighlightingOnLoad ();
        </script>
    </head>
    <body>
        <div id="header">
            <a id="header-title"><?php echo $file['filename'] . '.' . $file['ext']?></a>
        </div>
        <div id="main">
            <pre><code><?php echo $file['content'] ?></code></pre>
        </div>
    </body>
</html>