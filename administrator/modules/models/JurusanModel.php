<?php
/**
 * @Author  : David Naista<davidnaista83@gmail.com>
 * @Date    : 12/29/15 - 3:32 AM
 */

class JurusanModel extends Model{

    protected $tableName = "jurusan";

    public function get($params = "") {

        $data = array();

        $jurusan = $this->db->getAll($this->tableName)->toObject();


        foreach($jurusan as $val) {

            $total = $this->db->getWhere($this->tableName, array('id_jurusan' => $val->id_jurusan))->numRows();
            $val->total = $total;

            array_push($data, $val);
        }
        return $data;

    }

}
?>