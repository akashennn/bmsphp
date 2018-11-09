<!-- <h1> <?= $title?> </h1> -->

<main role="main">

<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Welcome to BMS</h1>
    <p class="lead text-muted">BMS is a store that sells books, and where people can buy them. A used bookstore or second-hand bookshop sells and often buys used books. Based in Colombo, Sri Lanka.</p>
    <!-- <p>
      <a href="#" class="btn btn-primary my-2">Main call to action</a>
      <a href="#" class="btn btn-secondary my-2">Secondary action</a>
    </p> -->
  </div>
</section>


<div class="container">
<div class="row" style="margin: 0 50px">
<?php foreach ($cat as $cat) : ?>
<div class="card" style="width: 18rem; margin: 10px 20px">

  <a href="<?php echo site_url('category/view/'.$cat['id']);?>">
  <img class="card-img-top" style="height: 390px" src="<?php echo $cat['image_url']; ?>" alt="Card image cap">
  </a>
  <div class="card-body">
    <h5 class="card-title text-center"><?php echo $cat['name']; ?></h5>
  </div>

</div>
<?php endforeach; ?>
<div>
<div>


</main>