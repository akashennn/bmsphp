<!-- <h1> <?= $title?> </h1> -->

<main role="main">

<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Album example</h1>
    <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
    <p>
      <a href="#" class="btn btn-primary my-2">Main call to action</a>
      <a href="#" class="btn btn-secondary my-2">Secondary action</a>
    </p>
  </div>
</section>


<div class="container">
<div class="row" style="margin: 0 50px">
<?php foreach ($cat as $cat) : ?>
<div class="card" style="width: 18rem; margin: 10px 20px">

  <a href="<?php echo site_url('book/view/'.$cat['id']);?>">
  <img class="card-img-top" style="height: 390px" src="<?php echo $cat['image_url']; ?>" alt="Card image cap">
  </a>
  <div class="card-body">
    <h5 class="card-title text-center"><?php echo $cat['title']; ?></h5>
  </div>

</div>
<?php endforeach; ?>
<div>
<div>


</main>