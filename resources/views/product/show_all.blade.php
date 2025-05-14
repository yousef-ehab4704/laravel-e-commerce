<!DOCTYPE html>
<html lang ="en">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<style>
    .wp-block {
  margin: 0 0 15px 0;
  padding:15px;
  -webkit-transition: all .3s linear;
  transition: all .3s linear;
  position: relative;
  cursor: default;
  border-radius: 2px;
}

.wp-block.product {
  background: #fff;
  padding: 15px;
  margin-bottom: 20px;
  border: 1px solid #e0eded;
}

.wp-block:before, .wp-block:after {
  display: table;
  content: "";
}

.wp-block.product figure {
  padding-bottom: 15px;
  border-bottom: 1px solid #e0eded;
}

.img-center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}

.wp-block.product .product-title {
  margin: 10px 0 0 0;
  padding: 0;
  border-bottom: 0;
}

h2 {
  font-size: 25px;
}

.wp-block.product .product-title a {
  font-size: 16px;
  font-weight: 600;
  color: #333;
}

.wp-block.product p {
  color: #616161;
}

.wp-block.product .wp-block-footer {
  border-top: 1px solid #e0eded;
  padding-top: 15px;
  padding-bottom:25px;
}

.wp-block.product .price {
  padding: 4px 0;
  font-size: 13px;
  font-weight: 600;
  color: #333;
}

.btn-base {
  color: #fff !important;
  background-color: #3498db;
  border: 1px solid;
  border-color: #258cd1;
}

.btn-icon {
  position: relative;
}

.btn-icon.btn-sm span, .btn-icon.btn-sm input {
  padding-left: 35px;
}

.btn {
    border-radius: 0;
    border: 0;
    border-bottom: 4px solid #CCCCCC;
    margin:0;
    -webkit-box-shadow: 0 5px 5px -6px rgba(0,0,0,.3);
       -moz-box-shadow: 0 5px 5px -6px rgba(0,0,0,.3);
            box-shadow: 0 5px 5px -6px rgba(0,0,0,.3);
}

.btn-info {
    background-color: #39b3d7;
    border-color: #348fd2;
    text-shadow: 1px 1px 0 #238ed5;
}
.grid-container {
    display: grid;
    gap: 100px;
}
</style>
@foreach($products as $product)
<div class="wp-block">
    <div class="row">
       <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="wp-block product">
                <figure>
                    <img alt="" src="https://www.bootdey.com/image/450x180/E6E6FA/000000" class="img-responsive img-center">
                </figure>
                <h2 class="product-title">
                    <a href="">{{$product->name}}</a>
                </h2>
                <p>
Stock: {{$product->stock}}
                </p>
                <div class="wp-block-footer">
                    <span class="price pull-left">${{$product->price}}</span>
                    <a href="#" class="btn btn-sm btn-info btn-icon btn-cart pull-right">
                        <i class="fa fa-cart-plus"></i>
                        <span>Add to cart</span>
                    </a>
                </div>
            </div>
        </div>
	</div>
</div>
@endforeach
</html>