<h2 class="title-top">Detail Guru</h2>
<table style="width: 100%;">
    <tbody>
        <?php foreach ($data["guru"] as $guru) { ?>
            <tr>
                <td style="vertical-align: middle; width:220px; padding-right:20px;">
                    <?php if ($guru->images) { ?>
                        <img src="public/images/guru/<?= $guru->images; ?>" style="width: 200px;">
                    <?php } else { ?>
                        <img src="resources/images/no_user.jpg" style="width: 200px;">
                    <?php } ?>
                    <a href="<?= SITE_URL; ?>?page=guru" style="margin-top: 10px; display:block;" class="btn btn-primary">Daftar Guru</a>
                </td>
                <td style="vertical-align: top;">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td style="border-top: 0;">Nama</td>
                                <td style="border-top: 0;">:</td>
                                <td style="border-top: 0;">
                                    <b><?= $guru->nama_lengkap; ?></b>
                                </td>
                            </tr>
                            <tr>
                                <td>NIP</td>
                                <td>:</td>
                                <td><b><?= $guru->nip; ?></b></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td><b><?= $guru->jenis_kelamin; ?></b></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><b><?= $guru->status; ?></b></td>
                            </tr>
                            <tr>
                                <td>Mata Pelajaran</td>
                                <td>:</td>
                                <td><b><?= $guru->mata_pelajaran; ?></b></td>
                            </tr>
                            <tr>
                                <td>Tempat Tanggal Lahir</td>
                                <td>:</td>
                                <td><b><?= $guru->tempat_lahir; ?>, <?= date("d-m-y", strtotime($guru->tempat_lahir)); ?></b></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><b><?= $guru->alamat; ?></b></td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>