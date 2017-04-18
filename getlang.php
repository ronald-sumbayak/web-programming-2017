<?php
function getLanguage ($ext) {
    switch ($ext) {
        case "c":    return "C";
        case "cpp":  return "C++";
        case "java": return "Java";
        case "js":   return "JavaScript";
        case "css":  return "CSS";
        case "html": return "HTML";
        case "php":  return "PHP";
        case "cs":   return "C#";
        case "py":   return "Python";
        case "json":   return "JSON";
        case "xml":   return "XML";
        case "ini":   return "ini";
        case "sql":   return "SQL";
        default:     return "Unrecognized";
    }
}