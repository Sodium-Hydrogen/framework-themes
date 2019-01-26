<?php
http_response_code(403);
echo "<title>Forbidden</title>";
echo "<h1>Forbidden</h1>
<hr>
<p>Error 403: The requested URL " . $_SERVER['REQUEST_URI'] . " is forbidden.</p>

?>
