<?php
    include_once('../includes/session.php');
    include_once('../database/db_animal.php');
    include_once('../database/db_topic.php');

    $search_string = $_POST['search_string']; // Name, Species, Breed
    // vv Sliders vv
    // $weight
    // $dimension
    // $gender
    // $age
    // vv Textbox vv  
    // $color

    $animals = getAllAnimals();
    $result = array();
    foreach($animals as &$animal){
        if ((stripos($animal['name'], $search_string) !== false) || (stripos($animal['species'], $search_string) !== false) || (stripos($animal['breed'], $search_string) !== false)){
            $topic = topicFromAnimalId($animal['id']);
            array_push($result, $topic);
        }
    }


    $_SESSION['search_results'] = $result;
    header('Location: ../pages/list_animals.php');

?>
