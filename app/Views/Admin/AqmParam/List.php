<?php $no = 1 ?>
<?php foreach ($params as $param) : ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $param->station_id ?></td>
        <td><?= $param->name ?></td>
        <td><?= $param->uname ?></td>
        <td><a id="getdeleteid" data-deleteid="<?= $param->id ?>" class="btn btn-danger btn-sm mx-1" data-toggle="modal" data-target="#modal-delete"><i class="fas fa-trash"></i></a></td>
    </tr>
<?php endforeach ?>