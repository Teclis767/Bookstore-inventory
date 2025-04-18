<?php
//Book inventory array, numbered arrays each with title, author, price and quantity
$inventory = array(
  array(
      "title" => "The Odyssey",
      "author" => "Homer",
      "price" => 15,
      "quantity" => 120
  ),
  array(
      "title" => "Jane Eyre",
      "author" => "Charlotte Brontë",
      "price" => 22,
      "quantity" => 75
  ),
  array(
      "title" => "War and Peace",
      "author" => "Leo Tolstoy",
      "price" => 30,
      "quantity" => 50
  ),
  array(
      "title" => "Don Quixote",
      "author" => "Miguel de Cervantes",
      "price" => 18,
      "quantity" => 200
  ),
  array(
      "title" => "Brave New World",
      "author" => "Aldous Huxley",
      "price" => 13,
      "quantity" => 31
  ),
  array(
      "title" => "Moby-Dick",
      "author" => "Herman Melville",
      "price" => 20,
      "quantity" => 17
  ),
);

//function adding new book with 4 parameters
function addBook(&$inventory, $title, $author, $price, $quantity) {
  $inventory[] = array(
      "title" => $title,
      "author" => $author,
      "price" => $price,
      "quantity" => $quantity
  );
}

//function removing the book from inventory and reindexing entire array
function removeBook(&$inventory, $title) {
  foreach ($inventory as $index => $book) {
      if ($book["title"] === $title) {
          unset($inventory[$index]); // Remove the book from the inventory
      }
  };
  $inventory = array_values($inventory); // Reindex the array
};

//temporary display function to check code.
function display($inventory) {
  foreach ($inventory as $book) {
    print_r($book);
    echo "</br>";
  };
};

// function updating quantity based on title and new quantity
function updateQuantity(&$inventory, $title, $newQuantity) {
  foreach($inventory as $index => $book) {
    if ($book["title"] == $title) {
      $inventory[$index]["quantity"] = $newQuantity;
    };
  };
};


// Sorts the inventory by the specified property (title, author, price, or quantity)
function sortInventory(&$inventory, $sortBy){
  // making new array composed of 
  $sortArray = array();
  $bookStorageArray = array();

  foreach ($inventory as $index => $book) {
    $sortArray[] = $book[$sortBy]; // appending elements to sort them out
    $bookStorageArray[$book[$sortBy]] = $book;
  };

    sort($sortArray); // finally sorting elements

  //replacing sortArray with books instead of value we are sorting by, in correct order!
  $sortedInventory = array();
  foreach ($sortArray as $value) {
      $sortedInventory[] = $bookStorageArray[$value]; // use sorted keys to create new array with books
  }

  //replace original inventory
  $inventory = $sortedInventory; 
}



echo "Original inventory: </br>";
display($inventory);
echo "</br>";

echo "Inventory after addBook function(\"a\"): </br>";
addBook($inventory, "a", "b", 5, 3);
display($inventory);
echo "</br>";

echo "Inventory after removeBook function(\"a\"): </br>";
removeBook($inventory, "a");
display($inventory);
echo "</br>";

echo "Inventory after updateQuantity function(\"Brave New World\", 97): </br>";
updateQuantity($inventory, "Brave New World", 97);
display($inventory);
echo "</br>";

echo "Inventory after sortInventory function(by price): </br>";
sortInventory($inventory, "price");
display($inventory);
?>
echo "</br>";
sortInventory($inventory, "title");
display($inventory);
?>
