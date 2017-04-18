var editor, result;
var innerHint = "<h3 style=\"margin:5px;font-family:cursive\">you can also type<br>&lt;&mdash; here</h3>";
var hint = 
    "<p>this text enclosed by html &lt;p&gt; tag</p>\r\n" + 
    "<ul>\r\n" +
    "    <li>and this is html &lt;ul&gt; tag</li>\r\n" + 
    "</ul>\r\n" +
    "<a href=\"index.html\">try it yourself :).</s>";

function applyCode () {
    result.innerHTML = editor.value;
}

function giveHint1 () {
    editor.value = hint;
    applyCode ();
}

function setInnerCode () {
    var innerEditor, innerResult;
    innerResult = $('.result-area')[1];
    innerEditor = $('.editor-area')[1];
    innerEditor.onkeyup = function () { innerResult.innerHTML = this.value; }
    innerEditor.onpaste = function () { innerResult.innerHTML = this.value; }
    innerEditor.value = innerHint;
    innerResult.innerHTML = innerEditor.value;
    
    var innerHintText;
    innerHintText = $('.hint')[1];
    innerHintText.style.visibility = "hidden";
}

function giveHint2 () {
    editor.value = $('html')[0].innerHTML;
    applyCode ();
    setInnerCode ();
}

function start () {
    var btnHint;
    btnHint = $('#hint-button-1')[0];
    btnHint.onclick = giveHint1;
    btnHint = $('#hint-button-2')[0];
    btnHint.onclick = giveHint2;
    
    result = $('#result-area')[0];
    editor = $('#editor-area')[0];
    editor.onkeyup = applyCode;
    editor.onpaste = applyCode;
}

window.onload = start;