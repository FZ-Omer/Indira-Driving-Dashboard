<?php
    require 'config.php';

    $grand_total = 0;
    $allItems = '';
    $items = [];

    $sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $grand_total += $row['total_price'];
      $items[] = $row['ItemQty'];
    }
    $allItems = implode(', ', $items);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Guhan Agencies - Checkout</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">About</a>
                    <a class="text-body mr-3" href="">Contact</a>
                    <a class="text-body mr-3" href="">Help</a>
                    <a class="text-body mr-3" href="">FAQs</a>
                </div>
            </div>
         
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <img src="../images/logo_crack.png"  width="105" height="90px">
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0">+91 9795859795 / +91 7788992297</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <a href=".filter-loosecrackers" class="nav-item nav-link" data-filter=".filter-loosecrackers">Single Crackers</a>
                        <a href="" class="nav-item nav-link">Loose Crackers</a>
                        <a href="" class="nav-item nav-link">Chakkers</a>
                        <a href="" class="nav-item nav-link">Sparklers</a>
                        <a href="" class="nav-item nav-link">Caps & colours Matches</a>
                        <a href="" class="nav-item nav-link">Gift Box</a>
                        <a href="" class="nav-item nav-link">Multi Shots</a>
                        <a href="" class="nav-item nav-link">Single Shots</a>
                        <a href="" class="nav-item nav-link">LAR Crackers</a>
                        <a href="" class="nav-item nav-link">Flower-Pots</a>
                        <a href="" class="nav-item nav-link">Twinkling Stars</a>
                        <a href="" class="nav-item nav-link">Bomb</a>
                        <a href="" class="nav-item nav-link">Rockets</a>
                        <a href="" class="nav-item nav-link">Novel Items</a>

                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Guhan</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Crackers</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="../index.html" class="nav-item nav-link">Home</a>
                            <a href="index.html" class="nav-item nav-link ">Product</a>
                            <a href="catagories.php" class="nav-item nav-link ">Shopping </a>
                            <a href="cart.php" class="nav-item nav-link">Cart</a>
                            <a href="checkout.php" class="nav-item nav-link  active">Checkout</a>
                            <a href="contact.html" class="nav-item nav-link ">Contact</a>
                        </div>
                      
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    <!-- Navbar End -->

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
     <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 px-4 pb-4" id="order">
        <h4 class="text-center text-info p-2">Complete your order!</h4>

        <div class="jumbotron p-3 mb-2 text-center">
            <h6 class="lead">Kindly Deposit Amount On </h6>
            <h2 class="text-danger"><b>Guhan Agencies</b></h2>
             <h4 ><b class="text-success">Bank :</b>IOB,Sivakasi Branch, <b class="text-success">A/C No </b> :349002000000496<br><b class="text-success"> IFS Code:</b> IOBA0003490</h4>

          <h6 class="lead"><b>Product(s) : </b><span id="product"><?= $allItems; ?></span></h6>
          <h6 class="lead"><b id="delivery">Delivery Charge : Free</b></h6>
         <h5><b>Total Amount Payable : </b><span id="grand-total"><?= number_format($grand_total,2) ?>/-</span></h5>
        </div>
       <form action="" method="post" id="placeOrder">
  <input type="hidden" name="products" value="<?= $allItems; ?>">
  <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
  <div class="form-group">
    <input type="text" name="name" class="form-control" placeholder="Enter Name" id="name" required>
  </div>
  <div class="form-group">
    <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" id="email" required>
  </div>
  <div class="form-group">
    <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" id="phone" required>
  </div>
  <div class="form-group">
    <textarea name="address" class="form-control" rows="3" cols="10"  id="address" placeholder="Enter Delivery Address Here..."></textarea>
  </div>
  <div class="form-group">
    <input type="text" name="city" class="form-control" placeholder="Enter City" id="city" required>
  </div>
  <div class="form-group">
    <input type="text" name="state" class="form-control" placeholder="Enter State" id="state" required>
  </div>
  <div class="form-group">
    <input type="text" name="zipcode" class="form-control" placeholder="Enter Zip Code" id="zipcode" required>
  </div>
  <h6 class="text-center lead">Select Payment Mode</h6>
  <div class="form-group">
    <select name="pmode" class="form-control" id="pmode">
      <option value="" selected disabled>-Select Payment Mode-</option>
      <option value="cod">Cash On Delivery</option>
      <option value="netbanking">Net Banking</option>
      <option value="cards">Debit/Credit Card</option>
    </select>
  </div>
  <div class="form-group">
    <input type="submit" name="submit"  value="Place Order" class="btn btn-danger btn-block">
  </div>
</form>


      </div>
    </div>
  </div>
    <!-- Checkout End -->
    

    <!-- Footer Start -->
<div class="container-fluid bg-dark text-secondary mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
            <p class="mb-4">We are specialist in fancy crackers and customized gift box. We are leading store, selling online anil crackers.</p>
            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Guhan agencies,
                25 E, Gandhi road,
            Sivakasi.</p>
            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>anandh.mtr@gmail.com</p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+91 9795859795</p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+91 7788992297</p>

        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                        <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                        <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                    <p>Ready To Start</p>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Your Email Address">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Sign Up</button>
                            </div>
                        </div>
                    </form>
                    <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex">
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-secondary">
                &copy; <a class="text-primary" href="#">Lyzoo Technologies</a>. All Rights Reserved. Designed
                by
                <a class="text-primary" href="https://htmlcodex.com">Lyzoo Technologies</a>
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="img/payments.png" alt="">
        </div>
    </div>
</div>
<!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script type="text/javascript">
  $(document).ready(function() {

  $("#placeOrder").submit(function(e) {
  e.preventDefault();
  var name = $("#name").val();
  var email = $("#email").val();
  var phone = $("#phone").val();
  var address = $("#address").val();
  var city = $("#city ").val();
  var state = $("#state").val();
  var zip = $("#zip").val();
  var paymentMode = $("#pmode").val();
  
  var orderDetails = "Product(s) : <?= $allItems; ?>, Delivery Charge : Free, Total Amount Payable : <?= number_format($grand_total,2) ?>/-" + 
    "\nCustomer Details:\nName: " + name +
    "\nEmail: " + email +
    "\nPhone: " + phone +
    "\nAddress: " + address +
    "\nCity: " + city +
    "\nState: " + state +
    "\nZip Code: " + zip +
    "\nPayment Mode: " + paymentMode;
  
  var whatsappMessage = encodeURIComponent("Hi, I would like to place an order with the following details:\n" + orderDetails);
  
  window.open("https://wa.me/9795859795?text=" + whatsappMessage, "_blank");
  
  $.ajax({
    url: 'action.php',
    method: 'post',
    data: $('form').serialize() + "&action=order",
    success: function(response) {
      $("#order").html(response);
    }
  });
});

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
   
</body>

</html>