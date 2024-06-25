
<?php
    require_once '../database/db.php';
    require_once '../lib/text.php';
    require_once '../lib/date.php';

    include 'partials/top.php';

    // Get the pet ID from URL
    $petID = $_GET['id'] ?? null;
    if (!$petID) die('Unknown pet ID');

    consoleLog($petID, 'Pet ID');

    // Connect to the database
    $db = connectToDB();

    // Get the pet records
    $query = 'SELECT name, species, dob, description 
                FROM pets 
                WHERE id=?';

    // Attempt to run the query. We should get a single record
    try {
        $stmt = $db->prepare($query);
        $stmt->execute([$petID]);
        $pet = $stmt->fetch();
    }
    catch (PDOException $e) {
        consoleError($e->getMessage(), 'DB SELECT');
        die('There was an error getting pet from the database');
    }

    // Check we have a record
    if (!$pet) die('No pet found for given ID');

    echo '<section id="pet-list">';

    echo   '<article>';
    echo     '<figure><img src="pet-image.php?id='.$petID.'" alt="'.$pet['name'].'"></figure>';
    echo     '<h3>'.$pet['name'].' the '.$pet['species'].'</h3>';
    echo     '<p>Born: <strong>'.formattedDate($pet['dob']).'</strong> ('.ageInYears($pet['dob']).')</p>';
    echo   '</article>';

    echo   '<article>';
    echo     '<h4>Description</h4>';
    echo     '<div>';
    echo       text2paras($pet['description']);
    echo     '</div>';
    echo   '</article>';

    echo   '<article>';
    echo     '<h4>Notes</h4>';

    // Now get the records from the linked table using the pet id
    $query = 'SELECT note, timestamp
                FROM notes
                WHERE pet=?
                ORDER BY timestamp DESC';

    // Attempt to run the query. We should get an array of records
    try {
        $stmt = $db->prepare($query);
        $stmt->execute([$petID]);
        $notes = $stmt->fetchAll();
    }
    catch (PDOException $e) {
        consoleError($e->getMessage(), 'DB SELECT');
        die('There was an error getting pet notes from the database');
    }

    // Check we have a record
    if (count($notes) == 0) {
        echo '<p>No notes.</p>';
    }
    else {
        // Show them all
        echo     '<ul>';
        foreach( $notes as $note ) {
            echo '<li>' . $note['note'];
            echo '<br><small>';
            echo 'Posted at ' . formattedTime($note['timestamp']);
            echo ' on ' . formattedDate($note['timestamp']);
            echo ' (' . daysFromToday($note['timestamp']) . ')';
            echo '</small>';
        }
        echo     '</ul>';
    }

    echo     '<a class="button" href="form-new-note.php?pet='.$petID.'"><button>New Note</button></a>';
    echo   '</article>';

    echo '</section>';

    echo '<a class="button" href="download-pet.php?id='.$petID.'"><button>Download this Information</button></a>';

    include 'partials/bottom.php';

    showDebugInfo();

?>










<!-- Needs to show the users lists, and views of their inputs. -->