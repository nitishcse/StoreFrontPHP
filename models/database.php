<?php

class Database {

    public static function connect() {
        $server = "localhost";
        $user = "root";
        $password = "";
        $database = "movie_store";
        
        $con = mysql_connect($server, $user, $password)
                or die("Unable to connect to MySQL");
        
        mysql_select_db($database,$con);
    }


}

?>