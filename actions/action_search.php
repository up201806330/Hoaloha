<?php
    include_once('../includes/session.php');
    include_once('../database/db_animal.php');
    include_once('../database/db_topic.php');
    
    // Name, Breed
    $search_string = $_POST['search_string']; 
    // Species
    $species = @$_POST['is_dog'] . '&' . @$_POST['is_cat'] . '&' . @$_POST['is_bird'] . '&' . @$_POST['is_other'];
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
        if ( // Finds animal with input string in name or in breed (if input is empty, all animals pass this filter)
            (empty($search_string) || ((stripos($animal['name'], $search_string) !== false) || (stripos($animal['breed'], $search_string) !== false))) &&
            // Finds animal of one of the selected species
            (stripos($species, $animal['species']) !== false)
            ){
            $topic = topicFromAnimalId($animal['id']);
            array_push($result, $topic);
        }
    }

    $_SESSION['search_results'] = $result;
    header('Location: ../pages/list_animals.php');

?>
