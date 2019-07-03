<?php
if(!empty($_GET['id'])){
    //DB details
    $dbHost = request()->getHttpHost();
    $dbUsername = 'root';
    $dbPassword = 'root'
    $dbName = 'tessfat';
    // request()->getHttpHost()
    
    //Create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    if ($db->connect_error) {
        die("Unable to connect database: " . $db->connect_error);
    }
    
    //get content from database
    // $query = $db->query("SELECT * FROM cms_content WHERE id = {$_GET['id']}");
    $query = App\OrderProduct::findOrFail($_GET['id']);
    
    if($query->num_rows > 0){
        $op = $query->fetch_assoc();
        echo '<h4>'.$op['id'].'</h4>';
        // echo '<p>'.$op['content'].'</p>';
        echo '<p>Helloooooo</p>';
    }else{
        echo 'Content not found....';
    }
}else{
    echo 'Content not found....';
}
?>