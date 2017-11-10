<?php
session_start();
include_once("connect.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cleaning Scents Catalog</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>

  <ul id="dropdown1" class="dropdown-content">
    <li>
      <?php
      if(isset($_SESSION["cart_test"]) && count($_SESSION["cart_test"])>0)
      {
      echo '<div class="cart-view-table-front" id="view-cart">';
      echo '<h4 class="indigo-text text-lighten-3">Your Shopping Cart</h4>';
      echo '<form method="post" action="cart_update.php">';
      echo '<table width="100%"  cellpadding="6" cellspacing="0">';
      echo '<tbody>';
      $total =0;
      $b = 0;
      foreach ($_SESSION["cart_test"] as $cart_itm)
      {
      $product_img_name = $cart_itm["product_img_name"];
      $product_name = $cart_itm["product_name"];
      $product_qty = $cart_itm["product_qty"];
      $product_price = $cart_itm["product_price"];
      $product_code = $cart_itm["product_code"];
      $bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
      echo '<tr class="'.$bg_color.'">';
      echo '<td>'.'<img alt="productimage" class="img_thumb" src ="' . $product_img_name . '">' . '</td>';
      echo '<td>'.$product_name.'</td>';
      echo '<td>Qty <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
      echo '<td><input type="checkbox" id="remove" name="remove_code[]" value="'.$product_code.'" /><label for="remove">Remove</label></td>';
      echo '</tr>';
      $subtotal = ($product_price * $product_qty);
      $total = ($total + $subtotal);
      }
      echo '<td colspan="4">';
      echo '<button type="submit">Update</button><a href="cart.php" class="button">Checkout</a>';
      echo '</td>';
      echo '</tbody>';
      echo '</table>';
  
      $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
      echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
      echo '</form>';
      echo '</div>';
      }
      ?>
    </li>
  </ul>
  <nav class="cyan accent-4">
    <div class="nav-wrapper container"><a id="logo-container" href="home.php" class="brand-logo">Cleaning Scents</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="catalog.php">SHOP</a></li>
        <li><a href="admin.php">ADMIN</a></li>
        <li><a href="client.php">PROFILE</a></li>
        <li><a class="dropdown-button" data-activates="dropdown1">YOUR CART<i class="material-icons right">shopping_cart</i></a></li>
        <li><a href="#"><i class="material-icons">search</i></a></li>
		    <li>
            <a id="toggle-search" href="#!">
            <i class="large mdi-action-search">
            </i>
			      </a>
        </li>
      </ul>
    </div>
  </nav>

<h3 class="header left indigo-text text-lighten-3">Products</h3>
<div class="row">
  <p class="header col s12 light">Need a clean home with its own unique flair? Look no further than the Cleaning Scents Company. We give a little boost to everyday living with our fresh, scented cleaning supplies. Each home using our products can expect a high-quality experience.</p>
</div>
<br><br>

<!-- View Cart Box Start -->



<!-- View Cart Box End -->

<!--<ul class="tabs">
    <li class="tab col s6"><a href="#test1">Product</a></li>
    <li class="tab col s6"><a href="#test2">Scent</a></li>
</ul>
        <br>
        <div id="test1" class="col s6">
        <form action="#">
        <p>
        <input type="checkbox" id="af" />
        <label for="af">Air Freshener</label>
        </p>
        <br>
        <button class="submit_filter" type="submit" name="formSubmit" action="" />Filter Results</button>
        </form>  
        </div>  

        <div id="test2" class="col s6">
        <form action="#">
        <p>
        <input type="checkbox" id="berry" />
        <label for="berry">Berry</label>
        </p>
        <p>
        <input type="checkbox" id="citrus" />
        <label for="citrus">Citrus</label>
        </p>
        <p>
        <input type="checkbox" id="floral" />
        <label for="floral">Floral</label>
        </p>
        <p>
        <input type="checkbox" id="herb" />
        <label for="herb">Herb</label>
        </p>
        <p>
        <input type="checkbox" id="wood" />
        <label for="wood">Wood</label>
        </p>
        <br>
        <button class="submit_filter" type="submit" name="formSubmit" action="submit.php" />Filter Results</button>
        </form>
        </div>
-->



<!-- Products List Start -->
<?php
$results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price FROM products ORDER BY id ASC");
if($results){ 
$test_item = '<ul class="products">';
//fetch results set as object and output HTML

//  <div class="product-desc">{$obj->product_desc}</div>

while($obj = $results->fetch_object())
{
$test_item .= <<<EOT
  <li class="product">
  <form method="post" action="cart_update.php">
  <div class="product-thumb"><img alt="productimage" class="img_thumb" src="{$obj->product_img_name}"></div>
  <div class="product-content"><h3>{$obj->product_name}</h3></div>
  <div class="product-info">
  Price {$currency}{$obj->price} 
  
  <fieldset>
  
  
  <label>
    <span>Quantity</span>
    <input type="number" size="99" maxlength="99" name="product_qty" value="1" />
  </label>
  
  </fieldset>
  <input type="hidden" name="product_code" value="{$obj->product_code}" />
  <input type="hidden" name="type" value="add" />
  <input type="hidden" name="return_url" value="{$current_url}" />
  <div align="center"><button type="submit" class="add_to_cart">Add</button></div>
  </div></div>
  </form>
  </li>
EOT;
}
$test_item .= '</ul>';
echo $test_item;
}
?>  
<!-- Products List End -->

  <footer class="page-footer indigo lighten-3">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Cleaning Scents</h5>
          <p class="grey-text text-lighten-4">This site is not official and is an assignment for a UCF Digital Media course.</p>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Links</h5>
          <ul>
            <li><a class="white-text" href="catalog.php">Shop</a></li>
            <li><a class="white-text" href="admin.php">Admin</a></li>
            <li><a class="white-text" href="client.php">Profile</a></li>
            <li><a class="white-text" href="cart.php">Your Cart</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Help</h5>
          <ul>
            <li><a class="white-text" href="#!">Contact</a></li>
            <li><a class="white-text" href="#!">FAQs</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      <p>Designed by DIG 4530c Group 6</p>
      </div>
    </div>
  </footer>
</body>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="js/init.js"></script>
<script>
      function makeTable(data){
       var tbl_body = "";
          $.each(data, function() {
            var tbl_row = "";
            $.each(this, function(k , v) {
              tbl_row += "<td>"+v+"</td>";
            })
            tbl_body += "<tr>"+tbl_row+"</tr>";                 
          })
 
        return tbl_body;
      }
 
      function getProductFilterOptions(){
        var opts = [];
        $checkboxes.each(function(){
          if(this.checked){
            opts.push(this.id);
          }
        });
 
        return opts;
      }
 
      function updateProduct(opts){
        $.ajax({
          type: "POST",
          url: "submit.php",
          dataType : 'json',
          cache: false,
          data: {filterOpts: opts},
          success: function(records){
            $('#phones tbody').html(makeTable(records));
          }
        });
      }
 
      var $checkboxes = $("input:checkbox");
      $checkboxes.on("change", function(){
        var opts = getProductFilterOptions();
        updateProduct(opts);
      });
 
      updateProduct();
</script> 
</html>
