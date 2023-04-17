<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
  <title>Calculator</title>
</head>

<body>
  <?php
  // Include the Calculator class
  class Calculator
  {
    private $num1;
    private $num2;
    private $result;



    public function setNum1($num1)
    {
      $this->num1 = $num1;
    }

    public function setNum2($num2)
    {
      $this->num2 = $num2;
    }

    public function add()
    {
      $this->result = $this->num1 + $this->num2;
      return $this->result;
    }

    public function subtract()
    {
      $this->result = $this->num1 - $this->num2;
      return $this->result;
    }

    public function multiply()
    {
      $this->result = $this->num1 * $this->num2;
      return $this->result;
    }

    public function divide()
    {
      if ($this->num2 == 0) {
        return "Error: division by zero";
      } else {
        $this->result = $this->num1 / $this->num2;
        return $this->result;
      }
    }
  }

  $calculator = new Calculator();


  // Create a new instance of the Calculator class
  $calculator = new Calculator();

  // Check if the form has been submitted
  if (isset($_POST['calculate'])) {
    // Get the user's input
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];

    // Set the values of num1 and num2 in the calculator object
    $calculator->setNum1($num1);
    $calculator->setNum2($num2);

    // Perform the selected operation and display the result
    switch ($operation) {
      case 'add':
        $result = $calculator->add();
        echo "Result: " . $result;
        break;
      case 'subtract':
        $result = $calculator->subtract();
        echo "Result: " . $result;
        break;
      case 'multiply':
        $result = $calculator->multiply();
        echo "Result: " . $result;
        break;
      case 'divide':
        $result = $calculator->divide();
        echo "Result: " . $result;
        break;
    }
  }
  ?>

  <div class="max-w-md mx-auto">
    <form method="post" class="bg-white p-4 rounded shadow-md">
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="num1">
          First number:
        </label>
        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="num1" type="number" name="num1" required value="<?php
                                                                                                                                                                                                echo htmlspecialchars($num1, ENT_QUOTES);
                                                                                                                                                                                                ?>">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="num2">
          Second number:
        </label>
        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="num2" type="number" name="num2" required value="<?php
                                                                                                                                                                                                echo htmlspecialchars($num2, ENT_QUOTES);
                                                                                                                                                                                                ?>">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="operation">
          Operation:
        </label>
        <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="operation" name="operation">
          <option value="add">Add</option>
          <option value="subtract">Subtract</option>
          <option value="multiply">Multiply</option>
          <option value="divide">Divide</option>
        </select>
      </div>
      <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="calculate">
          Calculate
        </button>
        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="reset">
          <?php
                  echo htmlspecialchars($result, ENT_QUOTES);
                  ?>
        </button>
      </div>
    </form>

  </div>

</body>

</html>