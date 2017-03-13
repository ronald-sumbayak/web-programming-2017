var editor, result;
var hint = 
    "<p>this text enclosed by html &lt;p&gt; tag</p>\r\n" + 
    "<ul>\r\n" +
    "    <li>and this is &lt;ul&gt; html tag</li>\r\n" + 
    "</ul>\r\n" +
    "<a href=\"index.html\">try it yourself :).</s>";

function applyCode () { result.innerHTML = editor.value; }

function giveHint1 () {
    editor.value = hint;
    applyCode ();
}

function giveHint2 () {
    var html = document.getElementsByTagName ('html')[0];
    editor.value = "";
    applyCode ();
    editor.value = html.innerHTML;
    applyCode ();
}

function start () {
    var btnHint;
    btnHint = document.getElementById ('hint-button-1');
    btnHint.onclick = giveHint1;
    btnHint = document.getElementById ('hint-button-2');
    btnHint.onclick = giveHint2;
    
    result = document.getElementById ('result-area');
    editor = document.getElementById ('editor-area');
    editor.onkeyup = applyCode;
    editor.onpaste = applyCode;
}

window.onload = start;