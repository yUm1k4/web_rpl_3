<?php
/**
 * @Author  : David Naista<davidnaista83@gmail.com>
 * @Date    : 12/15/15 - 1:50 AM
 */

class SiswaModel extends Model {

    protected $tableName = "siswa";

    public function rows() {

        return $this->db->getAll($this->tableName)->numRows();
    }

}
?>