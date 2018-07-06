<?php require_once("validation.php");  ?>

<!-- if the request get render the form 
     else validate the input -->
<?php if($_SERVER["REQUEST_METHOD"] == 'GET'){ ?>
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
    Name <input type="text" name="name" placeholder="your name">
    age <input type="number" name="age" placeholder="your age">
    email <input type="email" name="email" placeholder="your email">
    password <input type="password" name="password" placeholder="your password">
    date   <input type="date" name="date">
    <input type="submit" value="Submit">
  </form>  
<?php } else {
    $rules = [
        "name" => "required|max:10|min:3|unique:users",
        "age" => "required|integer|max:80|min:18",
        "password" => "required|max:10|min:20",
        "email" => "required|email|unique:users",
        "date" => "required|date",
        "x" => "required"
    ];
    $v = new validation($rules, "POST");
    $errors = $v->getErrors(); // get all errors
    if(isset($errors)){
        // render the form with the errors 
        $nameErrors = $v->getSpecificError("name"); // get the errors for name input
    } // the data is invalid
    else {} // valid
} ?>