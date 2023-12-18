<h1>Test about</h1>

<?php

    use App\src\Controller\DatabaseTest;
    use App\src\Database\DatabaseConnexion;

    $db = new DatabaseTest(DatabaseConnexion::getInstance());

    echo $db->displayTest();
?>