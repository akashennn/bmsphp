<section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image:url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3EmkqlZOg2DiYqKtKms6XAGj28hgceGbezm6wao-e8ZiQXfzx');">
  <div class="opacity-medium bg-extra-dark-gray"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 extra-small-screen display-table page-title-large">
        <div class="display-table-cell vertical-align-middle text-center">
          <!-- start page title -->
          <h1 class="text-white alt-font font-weight-600 letter-spacing-minus-1 margin-10px-bottom">Add New Book</h1>
          <span class="text-white opacity6 alt-font">Reading makes a full man.</span>
          <!-- end page title -->
        </div>
      </div>
    </div>
  </div>
</section>

<?php echo validation_errors(); ?>

<div class="wow fadeIn" id="start-your-project" style="padding-top:50px;">
    <div class="container">
        <?php echo form_open('book/create'); ?>
            <div class="row">
            <div class="col-md-12">
                <select class="form-control" name="category_id">
                    <option>Select Category</option>
                    <?php foreach ($cat as $cat) : ?>
                    <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
                <div class="col-md-12">
                    <input name="title" id="title" placeholder="Title *" class="big-input">
                </div>
                <div class="col-md-12">
                    <input name="image_url" id="image_url" placeholder="Image Url *" class="big-input">
                </div>
                <div class="col-md-12">
                    <input type="price" name="price" id="price" placeholder="Price *" class="big-input">
                </div>
                
                <div class="col-md-12">
                    <input type="author" name="author" id="author" placeholder="Author *" class="big-input">
                </div>
                <div class="col-md-12">
                    <textarea name="details" id="details" placeholder="Details *" rows="6" class="big-textarea"></textarea>
                </div>
                <div class="col-md-12 text-center">
                    <button id="project-contact-us-button" type="submit" class="btn btn-transparent-dark-gray btn-large margin-20px-top">Submit</button>
                </div>
            </div>
        </form>
    </div>
  </div>