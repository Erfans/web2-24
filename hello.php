<!DOCTYPE html>
<header>

<style>
    body{
        background-color: #<?php echo isset($_COOKIE["bg"])? $_COOKIE["bg"]: "fff" ?>;
    }
</style>

</header>
<body>

<?php
session_start();

// session

if(isset($_SESSION["counter"])) {
    $_SESSION["counter"] += 1;
}else{
    $_SESSION["counter"] = 1;
}

$location = isset($_SESSION["country"]) ? $_SESSION["country"] . " " . $_SESSION["city"]  : "unknown";
$job = isset($_COOKIE["job"]) ? $_COOKIE["job"] . " (" . $_COOKIE["position"] . ")"  : "unknown";

echo "Hello user from $location ,";
echo "your job is $job";
echo "<br/>";
echo "<strong>Count:</strong>";
echo $_SESSION["counter"];

echo "<br/>";
echo "<br/>";
print_r($_SESSION);

// cookie
echo "<br/>";
echo "<br/>";

/*
if(isset($_COOKIE["name"])){
    echo $_COOKIE["name"];
}

setcookie("name", "John,John2,John3", time() + 30 * 60, "/", "", false, true);
*/

if(!isset($_COOKIE["bg"])){
    setcookie("bg", "fff");
}

echo "<br/>";
echo "<br/>";
// print_r($_COOKIE)

// print_r($_GET);

if(isset($_GET["country"])){
    $_SESSION["country"] = $_GET["country"];
}

if(isset($_GET["city"])){
    $_SESSION["city"] = $_GET["city"];
}

if(isset($_POST["job"])){
    setcookie("job", $_POST["job"]);
}

if(isset($_POST["position"])){
    setcookie("position", $_POST["position"]);
}

print_r($_REQUEST); 

?>

<form method="get">
<label>Country</label>
<input name="country" />
<label>City</label>
<input name="city" />
<input type="submit" >
</form>

<form method="post">
<label>Job</label>
<input name="job" />
<label>Position</label>
<input name="position" />
<input type="submit" >
</form>

<?php 
print_r($_SERVER);
?>

</body>