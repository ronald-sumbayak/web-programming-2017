<!doctype html>
<html style="height:100%">
    <head>
        <title>GenocIDE - The world future greatest editor for all language (HTML only for now)</title>
        <script src="jquery-3.1.1.min.js"></script>
        <script src="scripts.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto"/>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div id="header">
            <a href="index.html" id="header-title">&lt;/GenocIDE&gt;</a>
        </div>
        
        <div id="main">
            <div>
                <p><b class="code-hint">&lt;/&gt;:</b></p>
                <textarea class="editor-area" id="editor-area" placeholder="Try typing something here."></textarea>
                <p class="hint">Can't figure anything to type? Click
                    <button class="hint-button-1" id="hint-button-1">Here</button> or
                    <button class="hint-button-2" id="hint-button-2">Here</button>.
                </p>
            </div>
            <div>
                <p class="code-hint">Output:</p>
                <div class="result-area" id="result-area"></div>
            </div>
        </div>
    </body>
</html>