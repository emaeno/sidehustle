<?php

    session_start();

?>

<html>
<body>

    <h3><b>Welcome <?php echo htmlspecialchars($_POST["name"]); ?></b></h3><br>
    <p><i>... please wait while your course content is loading</i></p>

</body>
</html>