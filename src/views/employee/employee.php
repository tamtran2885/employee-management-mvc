<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Employee</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
  <link rel="icon" href="<?php echo constant('URL') ?>favicon.svg">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>assets/css/main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
  <script type="module" src="<?php echo constant('URL') ?>assets/js/index.js" defer></script>
  <script type="module" src="<?php echo constant('URL') ?>assets/js/gallery.js" defer></script>
</head>

<?php

// session_start();

// require_once("./library/sessionHelper.php");

// checkSession(); // We check if the user has active login
// checkSessionExpired(); // We check if the user session is still active

require_once("./assets/html/header.php");

?>

<div class="d-flex flex-column justify-content-center align-items-center">

  <?php

  //   if (isset($_GET['info']) && $_GET['info'] == "success") {
  //     echo "
  //       <div class='align-items-center text-white bg-primary border-0 w-25 my-5' id='toast'>
  //         <div class='d-flex'>
  //           <div class='toast-body'>
  //             Employee successfully updated!
  //           </div>
  //         </div>
  //       </div>";
  //   }

  //   $jsonData = file_get_contents('../resources/employees.json');
  //   $usersData = json_decode($jsonData, true);

  //   $newEmployee = end($usersData);
  //   $nextId = $newEmployee["id"] + 1;

  //   if (isset($_GET['employee'])) {
  //     $currentEmployee = [];
  //     foreach ($usersData as $user) {
  //       if ($user["id"] == $_GET['employee']) {
  //         $currentEmployee = $user;
  //       }
  //     }

  //     if (isset($currentEmployee['avatar-field'])) {
  //       $seed = $currentEmployee['avatar-field'];
  //       echo "
  //       <figure>
  //         <img class='user-avatar' src='https://avatars.dicebear.com/api/bottts/$seed.svg' alt='User avatar'/>
  //         <figcaption class='text-center'>Current avatar</figcaption>
  //       </figure>";
  //     }
  //   }

  ?>

  <div id="avatarCarousel" class="h-25 gap-3">
    <p class="text-center">If you want to change your avatar, select one of the following and press Edit</p>
    <div id="avatarContainer" class="d-flex justify-content-center align-items-center">
      <img id="avatarOption1" alt="Avatar option 1" class='avatar-option' data-avatar>
      <img id="avatarOption2" alt="Avatar option 2" class='avatar-option' data-avatar>
      <img id="avatarOption3" alt="Avatar option 3" class='avatar-option' data-avatar>
      <img id="avatarOption4" alt="Avatar option 4" class='avatar-option' data-avatar>
      <img id="avatarOption5" alt="Avatar option 5" class='avatar-option' data-avatar>
    </div>
    <button id="refresh-button" class="refresh-button">Refresh avatars</button>
  </div>

  <form method="POST" action="<?php echo constant('URL') ?>employee/<?php echo isset($this->employee['id']) ? "updateEmployee" : "createEmployee" ?>" class="employee-form" class="form__input">
    <div class="form__row">
      <input type="hidden" name="id" id="id" value="<?php if (isset($this->employee['id']) && $this->employee['id']) echo $this->employee['id']; ?>">
      <input type="hidden" name="avatar-field" id="avatar-field" class="d-none">
      <div>
        <label for="name">Name</label>
        <input class="form__input" type="text" name="name" id="name" required value="<?php if (isset($this->employee['name']) && $this->employee['name']) echo $this->employee['name']; ?>">
      </div>
      <div>
        <label for="last-name">Last Name</label>
        <input class="form__input" type="text" name="lastName" id="lastName" required value="<?php if (isset($this->employee['lastName']) && $this->employee['lastName']) echo $this->employee['lastName']; ?>">
      </div>
    </div>
    <div class="form__row">
      <div>
        <label for="email-address">Email address</label>
        <input class="form__input" type="email" name="email" id="email" required value=<?php if (isset($this->employee['email']) && $this->employee['email']) echo $this->employee['email']; ?>>
      </div>
      <div>
        <label for="gender">Gender</label>
        <select class="form__input" name="gender" id="gender">
          <option value="Male" <?php if (isset($this->employee['gender']) && $this->employee['gender'] == "Male") echo "selected"; ?>>Male</option>
          <option value="Female" <?php if (isset($this->employee['gender']) && $this->employee['gender'] == "Female") echo "selected"; ?>>Female</option>
          <option>Other</option>
        </select>
      </div>
    </div>
    <div class="form__row">
      <div>
        <label for="city">City</label>
        <input class="form__input" type="text" name="city" id="city" required value=<?php if (isset($this->employee['city']) && $this->employee['city']) echo $this->employee['city']; ?>>
      </div>
      <div>
        <label for="street-address">Street Address</label>
        <input class="form__input" type="number" name="streetAddress" id="streetAddress" required value=<?php if (isset($this->employee['streetAddress']) && $this->employee['streetAddress']) echo $this->employee['streetAddress']; ?>>
      </div>
    </div>
    <div class="form__row">
      <div>
        <label for="state">State</label>
        <input class="form__input" type="text" name="state" id="state" required value=<?php if (isset($this->employee['state']) && $this->employee['state']) echo $this->employee['state']; ?>>
      </div>
      <div>
        <label for="age">Age</label>
        <input class="form__input" type="number" name="age" id="age" required value=<?php if (isset($this->employee['age']) && $this->employee['age']) echo $this->employee['age']; ?>>
      </div>
    </div>
    <div class="form__row">
      <div>
        <label for="postal-code">Postal Code</label>
        <input class="form__input" type="number" name="postalCode" id="postalCode" required value=<?php if (isset($this->employee['postalCode']) && $this->employee['postalCode']) echo $this->employee['postalCode']; ?>>
      </div>
      <div>
        <label for="phone-number">Phone Number</label>
        <input class="form__input" type="number" name="phoneNumber" id="phoneNumber" required value=<?php if (isset($this->employee['phoneNumber']) && $this->employee['phoneNumber']) echo $this->employee['phoneNumber']; ?>>
      </div>
    </div>
    <div class="btn-container">
      <button type="submit" class="btn-submit">Submit</button>
      <a href="#" class="btn-return">Return</a>
    </div>
</div>
</form>
</div>

</html>