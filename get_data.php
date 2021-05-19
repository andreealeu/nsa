<?php
    include_once 'includes/dbh.inc.php';

    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    // if ($type == "")
    // {
        $stmt = $conn->prepare("SELECT id, type, severity, date, message, user FROM log_report");
        $stmt->execute();
        $stmt->bind_result($id, $type,  $severity, $date, $message, $user);

        $logs = array();

        while($stmt->fetch()) {
            $log = new StdClass();
            $log->id = $id;
            $log->type = $type;
            $log->severity = $severity;
            $log->date = $date;
            $log->message = $message;
            $log->user= $user;

            array_push($logs, $log);
        }

        echo json_encode($logs);

        $stmt->close();
    
    // else
    // {
    //     $stmt = $conn->prepare("SELECT id, author, name, type, recipedesc FROM recipe where type = ?");
    //     $stmt->bind_param("s", $type);
    //     $stmt->execute();
    //     $stmt->bind_result($id, $author, $name, $type, $recipedesc);

    //     $recipes = array();

    //     while($stmt->fetch()) {
    //         $recipe = new StdClass();
    //         $recipe->id = $id;
    //         $recipe->author = $author;
    //         $recipe->name = $name;
    //         $recipe->type = $type;
    //         $recipe->recipedesc = $recipedesc;

    //         array_push($recipes, $recipe);
    //     }

    //     echo json_encode($recipes);

    //     $stmt->close();
    // }

	$conn->close();
?>