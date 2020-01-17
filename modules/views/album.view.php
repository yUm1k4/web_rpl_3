<h2 class="title-top">Data Guru</h2>
<table class="table table-stripped paging-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Judul</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($data["album"] as $album) { ?>
            <tr>
                <td style="vertical-align: middle;"><?= $no++; ?></td>
                <td style="vertical-align: middle;"><?= $album->tanggal; ?></td>
                <td style="vertical-align: middle;">
                    <b><a href="<?= SITE_URL; ?>?page=detailalbum&&id=<?= $album->id_album; ?>"><?= $album->judul; ?></a></b>
                </td>
                <td>
                    <?php if ($album->images) { ?>
                        <img src="public/images/album/<?= $album->images; ?>" style="width:50px; height:50px;">
                    <?php } else { ?>
                        <img src="resources/images/no_user.jpg" style="width:50px; height: 50px;">
                    <?php } ?>
                </td>

            </tr>
        <?php } ?>
    </tbody>
</table>