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

<h2 style="text-align:center"> Search result for "<?= $keyword?>"</h2>

<div class="container">
<table>
  <tr>
    <th>Title</th>
    <th>Author</th>
    <th>Price</th>
  </tr>
  <?php foreach ($cat as $cat) : ?>
  <tr>
    <td><?php echo $cat['title']; ?></td>
    <td><?php echo $cat['author']; ?></td>
    <td><?php echo $cat['price']; ?></td>
  </tr>
  <?php endforeach; ?>
</table>
</div>
