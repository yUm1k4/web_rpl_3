<h2 class="title-top">Detail Album</h2>
<table style="width: 100%;">
    <tbody>
        <?php foreach ($data["album"] as $album) { ?>
            <tr>
                <a href="<?= SITE_URL; ?>?page=album" style="margin-top: 10px; display:block;" class="btn btn-primary">Kembali</a>
                <td style="vertical-align: middle; width:220px; padding-right:20px;">
                    <?php if ($album->images) { ?>
                        <img src="public/images/album/<?= $album->images; ?>" style="width: 200px;">
                    <?php } else { ?>
                        <img src="resources/images/no_user.jpg" style="width: 200px;">
                    <?php } ?>
                </td>
                <td style="vertical-align: middle; width:220px; padding-right:20px;">
                    <?php if ($album->images) { ?>
                        <img src="public/images/album/<?= $album->images; ?>" style="width: 200px;">
                    <?php } else { ?>
                        <img src="resources/images/no_user.jpg" style="width: 200px;">
                    <?php } ?>
                </td>
                <td style="vertical-align: middle; width:220px; padding-right:20px;">
                    <?php if ($album->images) { ?>
                        <img src="public/images/album/<?= $album->images; ?>" style="width: 200px;">
                    <?php } else { ?>
                        <img src="resources/images/no_user.jpg" style="width: 200px;">
                    <?php } ?>
                </td>
                <td style="vertical-align: middle; width:220px; padding-right:20px;">
                    <?php if ($album->images) { ?>
                        <img src="public/images/album/<?= $album->images; ?>" style="width: 200px;">
                    <?php } else { ?>
                        <img src="resources/images/no_user.jpg" style="width: 200px;">
                    <?php } ?>
                </td>
                <td style="vertical-align: top;">
                    <table class="table">
                        <tbody>


                        </tbody>
                    </table>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>