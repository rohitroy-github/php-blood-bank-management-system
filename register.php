<!-- Main CMS/ Admin file  -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="./styles/adminStyles.css" />
    <link rel="stylesheet" href="./styles/index.css">
    <title>Blood Bank | Registration Panel</title>
  </head>

  <body>
    <!-- Menu Section -->
    <div class="top-container">
      <?php include './partials/navbar.php'; ?>
    </div>

    <!-- <?php if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    } ?> -->

    <!-- mainContentSection -->
    <div class="main-container container" id="dashboard">
      <div class="content">
        <h2 style="font-weight: 500; text-align: center">
          <b>Registration Panel</b>
        </h2>

        <div
          style="display: flex; flex-direction: row; justify-content: center"
        >
          <div class="d-flex justify-content-center" style="padding: 1%">
            <a href="./hospital/register.php" class="btn adminPanelBtn"
              >Hospital Registration</a
            >
          </div>

          <div class="d-flex justify-content-center" style="padding: 1%">
            <a href="./reciever/register.php" class="btn adminPanelBtn"
              >Reciever Registration</a
            >
          </div>
        </div>
      </div>
    </div>

    <!-- footerSection -->
    <div class="bottom-container">
      <?php include './partials/footer.php'; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
