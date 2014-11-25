/**
 * Loads Code Mirror and attaches it to #code textarea
 * 
 * @param  {boolean} readOnly TRUE if user must not write into it, else FALSE
 * @return {void}
 */
function loadCodeMirror(readOnly)
{
  window.editor = CodeMirror.fromTextArea(
    document.getElementById('code'),
    {
      lineNumbers: true,
      matchBrackets: true,
      mode: "application/x-httpd-php",
      indentUnit: 4,
      indentWithTabs: true,
      theme: "monokai",
      lineWrapping: true,
      readOnly: readOnly
    }
  );
}
