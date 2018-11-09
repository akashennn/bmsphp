<!-- <?php echo $cat['title']; ?> -->

<div class="container">
  <div class="row">
  <div class="col-sm-8">
    <img class="card-img-top" style="height: 390px; width:auto; margin: 5% 25%" src="<?php echo $cat['image_url']; ?>">
  </div>
  <div class="col-sm-4 text-center" style="margin: 5% 0%">
  <h4><?php echo $cat['title']; ?></h4>
  <ul class="list-group">
    <li class="list-group-item">LKR.<?php echo $cat['price']; ?></li>
    <li class="list-group-item"><?php echo $cat['author']; ?></li>
    <li class="list-group-item"><?php echo $cat['stock_available']; ?> items left.</li>
    <li class="list-group-item"><?php echo $cat['view_count']; ?> purchases in last week.</li>
    <a class="btn btn-outline-default my-2 my-sm-0" href="" style="background:black; color:white;"> Buy Now</a>
  </ul>
  </div>
<div>

<div class="container text-center">
<h6> Customers who viewed this item also viewed </h6>
<div class="row" style="margin: 0 50px">
<?php foreach ($pbooks as $cat) : ?>
<div class="card" style="width: 10rem; margin: 10px 20px">
  <img class="card-img-top" style="height: 200px" src="<?php echo $cat['image_url']; ?>" alt="Card image cap">
  <div class="card-body">
    <p class="card-title text-center"><?php echo $cat['title']; ?></p>
  </div>
</div>
<?php endforeach; ?>
</div>
</div>