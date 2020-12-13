<?php
    include_once('../includes/session.php');
    include_once('../database/db_animal.php');
    include_once('../database/db_topic.php');
    include_once('../database/db_proposal.php');
    
    // Name, Breed
    $search_string = isset($_POST['search_string']) ? $_POST['search_string']: "";
    // Species
    $species = @$_POST['is_dog'] . '&' . @$_POST['is_cat'] . '&' . @$_POST['is_bird'] . '&' . @$_POST['is_other'];
    // vv Sliders vv
    // Weight
    $weight_min = isset($_POST['weight_min']) ? $_POST['weight_min'] : 0;
    $weight_max = isset($_POST['weight_max']) ? $_POST['weight_max'] : 999;
    // Age
    $age_min = isset($_POST['age_min']) ? $_POST['age_min'] : 0;
    $age_max = isset($_POST['age_max']) ? $_POST['age_max'] : 999;
    // vv Checkboxes vv
    // Gender
    $is_male = @$_POST['is_male'];
    $is_female = @$_POST['is_female'];
    // Show adopted pets
    if(isset($_POST['show_adopted'])) $show_adopted = true;
    else $show_adopted = false;
    
    $animals = getAllAnimals();
    $result = array();

    foreach($animals as &$animal){
        if ( // Finds animal with input string in name or in breed (if input is empty, all animals pass this filter)
            (empty($search_string) || ((stripos($animal['name'], $search_string) !== false) || (stripos($animal['breed'], $search_string) !== false))) &&
            // Finds animal of one of the selected species
            (stripos($species, $animal['species']) !== false) && 
            // Finds animal of one of the selected genders 
            ($animal['gender'] === $is_male || $animal['gender'] === $is_female) && 
            // Finds animal with weight wthin given range
            ($animal['weight'] >= $weight_min && $animal['weight'] <= $weight_max) &&
            // Finds animal with age wthin given range
            ($animal['age'] >= $age_min && $animal['age'] <= $age_max) && 
            // If toggled, also shows animals already adopted
            ((!isAnimalAdopted($animal['id']) && !$show_adopted) || $show_adopted)
            ){
            $topic = topicFromAnimalId($animal['id']);
            array_push($result, $topic);
        }
    }

    $_SESSION['search_results'] = $result;
    header('Location: ../pages/list_animals.php');

?>
