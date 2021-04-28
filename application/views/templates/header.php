<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboards</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url();?>assets/css/sb-admin-2.min.css" rel="stylesheet">
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
    z-index: 1001;
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

.front-place {
    position: relative;
    z-index: 1001;
}





</style>  
</head>
