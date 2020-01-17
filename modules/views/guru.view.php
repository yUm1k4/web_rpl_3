<h2 class="title-top">Data Guru</h2>
<table class="table table-stripped paging-table">
    <thead>
        <tr>
            <th>Foto</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Mata Pelajaran</th>
            <th style="width: 88px;">Jenis Kelamin</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data["guru"] as $guru) { ?>
            <tr>
                <td>
                    <?php if ($guru->images) { ?>
                        <img src="public/images/guru/<?= $guru->images; ?>" style="width:50px; height:50px;">
                    <?php } else { ?>
                        <img src="resources/images/no_user.jpg" style="width:50px; height: 50px;">
                    <?php } ?>
                </td>
                <td style="vertical-align: middle;"><?= $guru->nip; ?></td>
                <td style="vertical-align: middle;">
                    <b><a href="<?= SITE_URL; ?>?page=detailguru&&id=<?= $guru->id_guru; ?>"><?= $guru->nama_lengkap; ?></a></b>
                </td>
                <td style="vertical-align: middle;"><?= $guru->mata_pelajaran; ?></td>
                <td style="vertical-align: middle;"><?= $guru->jenis_kelamin; ?></td>
                <td style="vertical-align: middle;"><?= $guru->status; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>