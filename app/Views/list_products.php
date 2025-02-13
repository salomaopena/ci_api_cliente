<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço Unitário</th>
                        <th>Estoque</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $product):?>
                        <tr>
                            <td><?php echo $product['id'];?></td>
                            <td><?php echo $product['product_name'];?></td>
                            <td><?php echo $product['category'];?></td>
                            <td><?php echo $product['price_per_unit'];?></td>
                            <td><?php echo $product['stock'];?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>