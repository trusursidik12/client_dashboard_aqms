<?php $no = 1 ?>
<?php foreach ($userStations as $uStation) : ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $uStation->full_name ?></td>
        <td><?= $uStation->station_id ?></td>
        <td><a id="getdeleteid" data-deleteid="<?= $uStation->id ?>" class="btn btn-danger btn-sm mx-1" data-toggle="modal" data-target="#modal-delete"><i class="fas fa-trash"></i></a></td>
    </tr>
<?php endforeach ?>