<h2 class="title-top">Data Alumni</h2>
<table class="table table-stripped paging-table">
    <thead>
        <tr>
            <th>Foto</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th style="width:88x;">Jenis Kelamin</th>
            <th>Angkatan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data["alumni"] as $alumni) {
            ?>
            <tr>
                <td>
                    <?php
                        if ($alumni->images) {
                            ?>
                        <img src="public/images/siswa/<?= $alumni->images; ?>" style="width:50px; height:50px;">
                    <?php
                        } else {
                            ?>
                        <img src="resources/images/no_user.jpg" style="width: 50px; height:50px;">
                    <?php
                        }
                        ?>
                </td>
                <td style="vertical-align: middle;">
                    <?= $alumni->nis; ?>
                </td>
                <td style="vertical-align: middle;">
                    <b><a href="<?= SITE_URL; ?>?page=alumni&&action=detail&&id=<?= $alumni->id_siswa; ?>"><?= $alumni->nama_lengkap; ?></a></b>
                </td>
                <td style="vertical-align: middle;">
                    <?= $alumni->nama_jurusan; ?>
                </td>
                <td style="vertical-align: middle;">
                    <?= $alumni->jenis_kelamin; ?>
                </td>
                <td style="vertical-align: middle;">
                    <?= $alumni->angkatan; ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>