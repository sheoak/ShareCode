function getCode(firstTime)
{
  if (!firstTime)
  {
    firstTime = false;
  }

  $.get(
    "ajax/code_get.php?slug=" + window.slug,
    function(data)
    {
      if (firstTime == true)
      {
        if (data.admin == true)
        {
          window.editor = CodeMirror.fromTextArea(
            document.getElementById("code"),
            {
              lineNumbers: true,
              matchBrackets: true,
              mode: "application/x-httpd-php",
              indentUnit: 4,
              indentWithTabs: true,
              theme: "monokai",
              lineWrapping: true
            }
          );

          $("textarea").keyup(
            function()
            {
              $.post(
                "ajax/code_update.php",
                {
                  slug: window.slug,
                  code: window.editor.getValue()
                }
              );
            }
          );
        }
        else
        {
          window.editor = CodeMirror.fromTextArea(
            document.getElementById("code"),
            {
              lineNumbers: true,
              matchBrackets: true,
              mode: "application/x-httpd-php",
              indentUnit: 4,
              indentWithTabs: true,
              theme: "monokai",
              lineWrapping: true,
              readOnly: true
            }
          );

          window.setTimeout(
            function ()
            {
              window.setInterval(
                function()
                {
                  $.get(
                    "ajax/code_test.php?slug=" + window.slug,
                    function(time)
                    {
                      if (time != window.lastCodeUpdateTime)
                      {
                        getCode();
                      }
                    }
                  );
                },
                500
              );
            },
            300
          );
        }
      }

      $.get(
        "ajax/code_test.php?slug=" + window.slug,
        function(time)
        {
          window.lastCodeUpdateTime = time;
        }
      );

      window.editor.setValue(data.code);
    }
  );
}
