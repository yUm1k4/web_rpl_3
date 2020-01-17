<?php
/**
 * @Author  : David Naista<davidnaista83@gmail.com>
 * @Date    : 1/13/16 - 10:17 AM
 */

use \modules\controllers\MainController;

class AlumniController extends MainController {

    public function index() {

        $this->model('siswa');

        $data = $this->siswa->getJoin('jurusan',
            array(
                'jurusan.id_jurusan' => 'siswa.id_jurusan'
            ),
            'JOIN',
            array(
                'status' => "Alumni"
            )
        );

        $this->template('siswa', array('siswa' => $data, 'title' => 'Alumni'));
    }
}
?>