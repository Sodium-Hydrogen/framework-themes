<?php
http_response_code(404);
echo "<title>Page Not Found</title>";
echo "<h1>Page Not Found</h1>
<hr>
<p>Error 404: The requested URL " . $_SERVER['REQUEST_URI'] . " was not found on this server.</p>

?>
