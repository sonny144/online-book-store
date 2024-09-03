<!DOCTYPE html>
<html lang="en">
<head>
<title>Contact Us Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href ="contact.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <!-- bootstrap 5 bundle CDN -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
     integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Online Book Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" 
          aria-current="page"
           href="index.php">Store</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" 
          href="contact.php">Contact Us</a>
       </li>
          <li class="nav-item">
          <a class="nav-link" 
          href="about.php">About</a>
          </li>
         <li class="nav-item">
          <a class="nav-link" 
          href="login.php">Login</a>
         </li>
         </ul>
    </div>
  </div>
</nav>

    <div style=" border-bottom: 1px solid black;">
        <h1 id="heading" style="display: flex; justify-content: center; align-items: center; margin-bottom: 2%;">Contact us</h1>
    </div>
    <p id="quote" style="display: flex; justify-content: center; align-items: center; margin-bottom: 2%; margin-top: 1%">"If you don't like to read, you haven't found the right book." - J.K.Rowling</p>
    <section>
        <div id="content" style="display: flex; justify-content: center; align-items: center; gap: 0; ">
            <img src="img/one.jpg" alt="image of a bookshelf" style="margin-right: 100px; margin-top: 1%"  >
            <div style="margin-left: 100px">
                <h2 id="question" style = "margin-bottom: 5%;">Need to contact someone? </h2>
                <p>Available from : 08:00 - 18:00</p>
                <p>Telephone number : 081 321 6778</p>
                <p>Email address : nuststudent@nust.na</p>
            </div>
        </div>
    </section>

</body>
</html>