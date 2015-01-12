/**
 * Checks if remote code is different from local one
 *
 * @todo   Instead of comparing stored characteristics with remote ones,
 *         we should use a safer comparison system (string comparison ? commits ID ?)
 *         since fast typing don't give enough time
 *         for the AJAX calls & Code Mirror update to correctly be executed
 *         while stored characteristics will always be executed
 *
 * @param  {boolean} firstTime TRUE if this is the first loading of the function, FALSE if not
 * 
 * @return {void}
 */
function checkCode(firstTime)
{
  $.get(
    "ajax/code_check.php?slug=" + window.slug,
    function(data, textStatus, jqXHR)
    {
      // If this is the first loading (= Code Mirror is not attached yet)
      if (typeof window.editor == 'undefined')
      {
        // If HTTP status code is 201
        // (because this user is the first to use this slug, thus the code file has just been created)
        if (jqXHR.status == 201)
        {
          // We load Code Mirror with readOnly = false (read & writing rights)
          loadCodeMirror(false);

          // We install the 'keyup' event handler on the #code textarea
          $('textarea').keyup(updateCode);
          $('textarea').on('paste', 'textarea', updateCode)

          // We set the global variable admin to TRUE
          window.admin = true;
        }
        else
        {
          // We load Code Mirror with readOnly = true (read-only right)
          loadCodeMirror(true);

          // We set the global variable admin to TRUE
          window.admin = false;
        }
      }

      // If remote code file characteristics are different from the stored ones
      // (we have to stringify objects to be able to compare them)
      // @see http://stackoverflow.com/questions/1068834/object-comparison-in-javascript
      if (JSON.stringify(data) != JSON.stringify(window.remoteCodeInfos))
      {
        // console.log(data);
        // console.log(window.remoteCodeInfos);

        getCode(function () { window.remoteCodeInfos = data; });
      }
      else
      {
        // We check again potential new code in 0.5 seconds
        window.setTimeout(checkCode, 500);
      }
    }
  );
}
