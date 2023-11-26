<?php
require "controller/account.php";
$account = get_account_information($_SESSION['user_id'])
  ?>
<div class="wrapper">
  <h1>Account</h1>
  <div class="account-settings__grid">
    <form action="../controller/update-user-info.php" method="post" enctype="multipart/form-data">

      <h2>Profile Picture</h2>
      <h3>aspect ration 1:1</h3>
      <div class="account_profile-picture">
        <label for="profile_picture" class="upload-label">
          <div class="add-icon-center">
            <i class="fa-solid fa-image fa-xl" style="color: white;"></i> <span>Upload</span>
          </div>
        </label>
        <input class="file__upload-image" type="file" id="profile_picture" name="profile_picture" accept="image/jpeg"
          onchange="handlePFPUpload()">
        <img id="pfpPreview"
          src="<?= isset($account['picture']) ? "data:image/jpeg;base64, " . base64_encode($account['picture']) : '' ?>"
          alt="">
      </div>
  </div>
  <label for="username">Username</label>
  <input name="username" id="username" type="text" value=<?= $account['username']; ?> disabled>
  <label for="is_public">Public Profile</label>
  <input id="publicProfile" type="checkbox" <?= $account['is_public'] ? 'checked' : '' ?>>
  <span id="publicView"></span>
  <label for="firstname">First Name</label>
  <input id="firstname" name="firstname" type="text" value="<?= $account['firstname']; ?>">
  <label for="lastname">Last Name</label>
  <input id="lastname" name="lastname" type="text" value="<?= $account['lastname']; ?>">
  <label for="email">Email</label>
  <input type="email" name="email" id="email" value="<?= $account['email']; ?>">
  <button class="green__button" type="submit">Submit</button>
  </form>
  <form action="change_password.php">
    <h2>Change Password</h2>
    <label for="current_password">Current Password</label>
    <input type="password" name="current_password" id="current_password">
    <label for="new_password">New Password</label>
    <input type="password" name="new_password" id="new_password">
    <label for="renew_password">Repeat New Password</label>
    <input type="password" name="renew_password" id="renew_password">
    <button type="submit">Save</button>
  </form>
</div>
</div>
<script>
  function handlePFPUpload() {
    const input = document.getElementById('profile_picture');
    const logoPreview = document.getElementById('pfpPreview');

    // Check if a file is selected
    if (input.files && input.files[0]) {
      const reader = new FileReader();

      // Read the uploaded file as a data URL
      reader.onload = function (e) {
        // Update the src attribute of the image with the data URL
        logoPreview.src = e.target.result;
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
  window.onload = function() {
    publicProfile();
};

document.getElementById('publicProfile').addEventListener('click', () => {
    publicProfile();
});

function publicProfile() {
    const checkbox = document.getElementById('publicProfile');
    const isPublic = document.getElementById('publicView');

    if (checkbox.checked) {
        isPublic.textContent = "Public";
    } else {
        isPublic.textContent = "Not Public";
    }
}

</script>