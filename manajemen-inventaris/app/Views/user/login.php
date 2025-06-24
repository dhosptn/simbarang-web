<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(135deg, #1e3c72, #2a5298);
  }

  #login-wrapper {
    background: #fff;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 100%;
    max-width: 400px;
  }

  h1 {
    margin-bottom: 1.5rem;
    font-weight: 600;
    color: #1e3c72;
  }

  .alert {
    background: #ffdddd;
    color: #d8000c;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 15px;
  }

  .mb-3 {
    margin-bottom: 1rem;
    text-align: left;
  }

  label {
    display: block;
    font-weight: 600;
    margin-bottom: 5px;
  }

  input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
    transition: 0.3s;
  }

  input:focus {
    border-color: #1e3c72;
    outline: none;
    box-shadow: 0px 0px 5px rgba(30, 60, 114, 0.3);
  }

  .btn {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    background: #1e3c72;
    color: white;
    cursor: pointer;
    transition: 0.3s;
  }

  .btn:hover {
    background: #2a5298;
  }
  </style>
</head>

<body>
  <div id="login-wrapper">
    <h1>Sign In</h1>

    <?php if (session()->getFlashdata('flash_msg')) : ?>
    <div class="alert">
      <?= session()->getFlashdata('flash_msg'); ?>
    </div>
    <?php endif; ?>

    <form action="" method="post">
      <div class="mb-3">
        <label for="InputForEmail">Email Address</label>
        <input type="email" name="email" id="InputForEmail" value="<?= set_value('email'); ?>" required>
      </div>
      <div class="mb-3">
        <label for="InputForPassword">Password</label>
        <input type="password" name="password" id="InputForPassword" required>
      </div>
      <button type="submit" class="btn">Login</button>
    </form>
  </div>
</body>

</html>