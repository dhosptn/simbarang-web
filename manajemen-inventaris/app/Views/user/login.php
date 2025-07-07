<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - SimBarang</title>
  <link rel="icon" type="image/svg+xml" href="<?= base_url('favicon.svg') ?>">
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
    background: linear-gradient(135deg, #4c63d2 0%, #764ba2 100%);
    background-attachment: fixed;
  }

  #login-wrapper {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    padding: 2.5rem;
    border-radius: 20px;
    box-shadow: 0px 20px 40px rgba(102, 126, 234, 0.3);
    text-align: center;
    width: 100%;
    max-width: 420px;
    border: 1px solid rgba(255, 255, 255, 0.2);
  }

  h1 {
    margin-bottom: 2rem;
    font-weight: 600;
    color: #4c63d2;
    font-size: 2rem;
    background: linear-gradient(135deg, #4c63d2, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  .alert {
    background: linear-gradient(135deg, #ff6b6b, #ee5a52);
    color: white;
    padding: 12px;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: 0px 5px 15px rgba(255, 107, 107, 0.3);
  }

  .mb-3 {
    margin-bottom: 1.5rem;
    text-align: left;
  }

  label {
    display: block;
    font-weight: 600;
    margin-bottom: 8px;
    color: #4c63d2;
    font-size: 0.9rem;
  }

  input {
    width: 100%;
    padding: 12px 15px;
    border: 2px solid rgba(102, 126, 234, 0.2);
    border-radius: 10px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.8);
    color: #4c63d2;
  }

  input:focus {
    border-color: #667eea;
    outline: none;
    box-shadow: 0px 0px 20px rgba(102, 126, 234, 0.3);
    background: rgba(255, 255, 255, 1);
    transform: translateY(-2px);
  }

  input::placeholder {
    color: rgba(76, 99, 210, 0.5);
  }

  .btn {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 10px;
    font-size: 1.1rem;
    font-weight: 600;
    background: linear-gradient(135deg, #4c63d2 0%, #764ba2 100%);
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 1rem;
    box-shadow: 0px 10px 25px rgba(102, 126, 234, 0.4);
  }

  .btn:hover {
    transform: translateY(-3px);
    box-shadow: 0px 15px 35px rgba(102, 126, 234, 0.5);
  }

  .btn:active {
    transform: translateY(-1px);
  }

  /* Logo styling */
  .logo {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #4c63d2, #764ba2);
    border-radius: 15px;
    margin: 0 auto 1.5rem auto;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    font-weight: 600;
    box-shadow: 0px 10px 25px rgba(76, 99, 210, 0.3);
  }

  .logo img {
    width: 28px;
    height: 28px;
    object-fit: contain;
    /* Remove filter if PNG already has white color, or keep it to make any color white */
    filter: brightness(0) invert(1);
  }

  .logo svg {
    width: 28px;
    height: 28px;
    fill: white;
  }

  /* Subtle animation */
  @keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
  }

  #login-wrapper {
    animation: float 6s ease-in-out infinite;
  }
  </style>
</head>

<body>
  <div id="login-wrapper">
    <h1>SimBarang</h1>

    <?php if (session()->getFlashdata('flash_msg')) : ?>
    <div class="alert">
      <?= session()->getFlashdata('flash_msg'); ?>
    </div>
    <?php endif; ?>

    <form action="" method="post">
      <div class="mb-3">
        <label for="InputForEmail">Email Address</label>
        <input type="email" name="email" id="InputForEmail" value="<?= set_value('email'); ?>" placeholder="Enter your email" required>
      </div>
      <div class="mb-3">
        <label for="InputForPassword">Password</label>
        <input type="password" name="password" id="InputForPassword" placeholder="Enter your password" required>
      </div>
      <button type="submit" class="btn">Sign In</button>
    </form>
  </div>
</body>

</html>