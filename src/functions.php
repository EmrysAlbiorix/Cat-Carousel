<?php
// Function to fetch cat breeds from Cat API
function getCatBreeds() {
    $url = "https://api.thecatapi.com/v1/breeds";
    $response = file_get_contents($url);
    return json_decode($response, true);
}

// Function to fetch cat information based on breed ID from Cat API
function getCatInfo($breedId) {
    $url = "https://api.thecatapi.com/v1/images/search?breed_ids=" . $breedId;
    $response = file_get_contents($url);
    return json_decode($response, true)[0];
}

// Fetch cat breeds
$catBreeds = getCatBreeds();

// Handle breed selection change
if(isset($_GET['breedId'])) {
    $breedId = $_GET['breedId'];
    $catInfo = getCatInfo($breedId);
    echo json_encode($catInfo);
    exit();
}
?>

<div class="container mt-5">
    <h2>Cat Carousel</h2>
    <div class="form-group">
        <label for="breedSelect">Select a breed:</label>
        <select class="form-control" id="breedSelect">
            <?php foreach ($catBreeds as $breed): ?>
                <option value="<?= $breed['id'] ?>"><?= $breed['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div id="catInfo">
        <!-- Cat information and image will be displayed here -->
    </div>
</div>

<script>
    $(document).ready(function(){
        // Handle breed selection change
        $('#breedSelect').change(function(){
            var breedId = $(this).val();
            // Fetch cat information based on selected breed
            $.get("cat_carousel.php", { breedId: breedId }, function(data){
                var catData = JSON.parse(data);
                var catInfo = '<h3>' + catData.breeds[0].name + '</h3>';
                catInfo += '<p>' + catData.breeds[0].description + '</p>';
                catInfo += '<img src="' + catData.url + '" alt="Cat Image">';
                $('#catInfo').html(catInfo);
            });
        });
    });
</script>

<!--//FIONNN SHIT-->

<?php
session_start(); /* this allows you to save data in $_SESSION */
/* https://www.w3schools.com/php/php_sessions.asp */

/* write PHP functions here */

function getSelectMenu() {
    $url = "https://api.thecatapi.com/v1/breeds" ;

    $response = file_get_contents($url) ;
    $json = json_decode($response) ;

    $first = $json[0] ;
    $id = $first->id ;
    $name = $first->name ;

    $form = "<form action = 'carousel.php' method = 'get'>" ;

    $form .= '<select name="catBreeds" class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>';

    foreach ($json as $cat) {
        $id = $cat['id'];
        $name = $cat['name'];
        $form .= "<option value='$id'>$name</option>";
    }

    $form .= '</select>';

    $form.= '<button name="Button" class="btn btn-primary" type="submit">Button</button>' ;

    $form.= "</form>" ;
    return $form ;
}

?>


