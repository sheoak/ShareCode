/**
 * Updates remote code from local one
 * 
 * @return {void}
 */
function updateCode()
{
  $.post(
    "ajax/code_update.php",
    {
      slug: window.slug,
      code: window.editor.getValue()
    }
  );
}
