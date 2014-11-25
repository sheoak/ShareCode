/**
 * Gets the code via Ajax (loaded in PHP from a text file)
 *
 * @todo   Get rid of jQuery for optimization sake
 * 
 * @param  {boolean} firstTime TRUE if this is the first loading of the function, FALSE if not
 * 
 * @return {void}
 */
function getCode(callback)
{
  // Ajax call to get the remote code
  $.get(
    "ajax/code_get.php?slug=" + window.slug,
    function(data)
    {
      // We update the local code within the #code textarea
      window.editor.setValue(data.code);

      // If callback function is set
      callback();

      // If user is not and admin, we re-launch the loop (to check remote code each 0.5 seconds)
      if (!window.admin) checkCode();
    }
  );
}
