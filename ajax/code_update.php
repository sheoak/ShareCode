<?php

$handle = fopen("../codes/" . $_POST['slug'] . ".txt", "w+");
fwrite($handle, $_POST['code']);
fclose($handle);
