<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

<section class="jumbotron text-center">
  <div class="container">
    <h2 style="text-align:center"> Search result for "<?= $keyword?>"</h2>
    <p class="lead text-muted">
    “A reader lives a thousand lives before he dies, said Jojen. The man who never reads lives only one.” 
    <br>
    ― George R.R. Martin
    </p>
    <!-- <p>
      <a href="#" class="btn btn-primary my-2">Main call to action</a>
      <a href="#" class="btn btn-secondary my-2">Secondary action</a>
    </p> -->
  </div>
</section>

<div class="container" style="margin-bottom:80px;">
<?php echo form_open('books/search'); ?>
<div class="input-group mb-3">
  <input type="text" class="form-control" name="keyword" placeholder="Search for a title or an author">
  <div class="input-group-append">
    <button class="btn btn-success" type="submit">Search</button> 
  </div>
</div>
</form>
</div>

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
</div>
</div>