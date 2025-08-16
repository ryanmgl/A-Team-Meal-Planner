<?php

$conn = new mysqli('localhost', 'root','', 'mealplan');

if($conn->connect_error){
  die("Connection failed: ". $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $meal_data = [
    'meal_name' => $meal_name,
    'meal_difficulty' => $meal_difficulty,
    'meal_type' => $meal_type
  ];
  $new_meal = $conn->prepare("INSERT INTO mealplan VALUES meal_name = ?, meal_difficulty = ?, meal_type = ?");
  $new_meal->bind_param("sss", $meal_name, $meal_difficulty, $meal_type);
  $new_meal->execute();
}
?>

<!DOCTYPE html>
<head>
  <meta charset = "UTF-8">
  <title>A Team Meal PLanner</title>
  <link rel = 'stylesheet' href = 'meal.css'>
</head>
<body>
  <div>
  <p>Add a Dish</p>
    <form method = 'post'>
      <input type='text' name = 'meal_name' placeholder='Enter the dish name here' required><br><br>
      <p> Select the dish's difficulty</p>
      <select name ='meal_difficulty' required>
        <option value="" selected hidden>Select difficulty</option>
        <option value="easy">Easy</option>
        <option value="medium">Medium</option>
        <option value="difficult">Difficult</option>
      </select>
      <p> Select the type of meal</p>
      <select name="meal_type" required>
        <option value="" selected hidden>Select type</option>
        <option value="meat">Meat</option>
        <option value="seafood">Seafood</option>
        <option value="veggie">Vegetable</option>
        <option value="special">Special</option>
      </select> <br><br>
      <button type ='submit'> Submit</button>
    </form>
  </div>
<hr>
  <div>
    <p>SUGGESTED MEAL PLAN</p>
    
  </div>

</body>


</html>