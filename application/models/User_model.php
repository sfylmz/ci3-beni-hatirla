<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model {

    public $tName = "";

    public function __construct()
    {
        parent::__construct();
        $this->tName = 'users';
    }

    /* *** getData: *** */
    public function getData($where = array())
    {
        return $this->db->where($where)->get($this->tName)->row();
    }

    /* *** getLimitData: *** */
    public function getLimitData($limit)
    {
        return $this->db->limit($limit)->get($this->tName)->result();
    }

    /* *** getCount: *** */
    public function getCount()
    {
        return $this->db->count_all($this->tName);
    }

    /* *** getRecords: *** */
    public function getRecords($field, $type, $value, $limit, $count)
    {
        return $this->db->like($field, $type, $value)->limit($limit, $count)->get($this->tName)->result();
    }

    /* *** getAll: *** */
    public function getAll($where = array(), $order = 'id ASC')
    {
        return $this->db->where($where)->order_by($order)->get($this->tName)->result();
    }

    /* *** addData: *** */
    public function addData($data = array())
    {
        return $this->db->insert($this->tName, $data);
    }

    /* *** updateData: *** */
    public function updateData($where = array(), $data = array())
    {
        return $this->db->where($where)->update($this->tName, $data);
    }

    /* *** deleteData: *** */
    public function deleteData($where = array())
    {
        return $this->db->where($where)->delete($this->tName);
    }

    /* *** deleteSelectData: *** */
    public function deleteSelectData($where_in, $data)
    {
        return $this->db->where_in($where_in, $data)->delete($this->tName);
    }


}