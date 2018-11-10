<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

#removeItem{
	color:red;
	font-weight: bold;
}
</style>

<h3 style="text-transform:uppercase;font-family:'Montserrat', sans-serif;" class="text-center">Shopping Cart</h3>
<div class="container">
<table>
  <tr>
  		<th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Sub Total</th>
        <th>Action</th>
  </tr>
  <?php foreach ($items as $item) { ?>
        		<tr>
        			<td><?php echo $item['id']; ?></td>
        			<td><?php echo $item['title']; ?></td>
					<td><?php echo $item['price']; ?></td>
        			<td><?php echo $item['stock_available']; ?></td>
        			<td><?php echo $item['price'] * $item['stock_available']; ?></td>
        			<td align="center">
        				<a id="removeItem" href="<?php echo site_url('cart/remove/'.$item['id']); ?>">X</a>
        			</td>
        		</tr>
    <?php } ?>
				<tr>
        			<td colspan="5" align="right">Total</td>
        			<td><strong><?php echo $total; ?></strong></td>
        		</tr>
</table>

<div class="text-center" style="margin-top:100px;">
<button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button>
<a href="<?php echo site_url('books'); ?>" class="btn btn-dark btn-lg btn-block">Continue Shopping</a>
</div>


</div>