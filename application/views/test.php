
<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
header {
    background-color: #FF9800;
    padding: 30px 0px 10px;
    display: inline-block;
    width: 100%;
}
.cart label{
    position: relative;
    color: #ffffff;
    font-size: 20px;
    cursor: pointer;
}
.cart .item i{
    font-size: 25px;
}
.cart .items-count {
    position: absolute;
    top: -14px;
    left: 17px;
    background-color: #ffffff;
    width: 18px;
    height: 18px;
    text-align: center;
    font-size: 12px;
    border-radius: 100%;
    color: #ff9800;
    align-items: center;
    display: grid;
    font-weight: bold;
}
.cart .items-list {
    background-color: #fff;
    padding: 15px 15px 0px 15px;
    border: 1px solid #ddd;
    width: 300px;
    border-radius: 4px;
    box-shadow: 0px 0px 8px 0px #888;
    position: absolute;
    right: 5px;
}
.cart .item-name,
.cart .item-price {
    margin: 0px 0px 5px;
}
.cart .item-pic {
    width: 100%;
    height: 50px;
    overflow: hidden;
    border: 1px solid #ddd;
}
.cart .item-pic img {
    height: 100%;
    margin: 0 auto;
    display: block;
}
.cart .item-remove {
    position: absolute;
    right: 15px;
    top: 15px;
}
.cart .item-remove i {
    font-size: 20px;
    color: #FF5722;
    opacity: 0.5;
    cursor: pointer;
}
.cart .item-remove i:hover {
    opacity: 1;
}
.cart .item {
    padding: 10px 0px;
    border-bottom: 1px solid #ddd;
}
.cart .view-cart {
    text-align: center;
    width: 100%;
    padding: 10px 15px;
    background-color: #eee;
    font-size: 18px;
    text-decoration: none;
    margin-top: -1px;
}
.cart .close-cart {
    float: left;
    color: #029687;
    cursor: pointer;
}
.cart .view-cart a {
    float: right;
    color: #03A9F4;
    text-decoration: none;
}
</style>  
</head>
<body>

<header>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>L O G O</h2>
            </div>
            <div class="col-6">
                <div class="cart float-right">
                    <label data-toggle="collapse" data-target="#ViewCart">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                        <span class="items-count">7</span> – Items
                    </label> 
                    <div class="items-list collapse" id="ViewCart">                        
                        <div class="item">
                            <div class="row">
                                <div class="col-4">
                                    <div class="item-pic">
                                        <img src="/images/item-1.jpg" class="img-fluid" alt="product">
                                    </div>
                                </div>
                                <div class="col-8 pl-0">
                                    <h6 class="item-name">Item Name</h6>
                                    <p class="item-price">$50</p>
                                    <span class="item-remove"><i class="fa fa-times" aria-hidden="true"></i></span>
                                </div>                           
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-4">
                                    <div class="item-pic">
                                        <img src="/images/item-1.jpg" class="img-fluid" alt="product">
                                    </div>
                                </div>
                                <div class="col-8 pl-0">
                                    <h6 class="item-name">Item Name</h6>
                                    <p class="item-price">$50</p>
                                    <span class="item-remove"><i class="fa fa-times" aria-hidden="true"></i></span>
                                </div>                           
                            </div>
                        </div>
  

                        <div class="row">
                            <div class="view-cart">
                                <span class="close-cart" data-toggle="collapse" data-target="#ViewCart">Close</span>
                                <a href="#">View Cart</a>                                                     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</header>
</body>
</html>

<script>
$(".item-remove").click(function(event) {
    event.preventDefault();
    $(this).parents('.item').remove();
});
</script>

