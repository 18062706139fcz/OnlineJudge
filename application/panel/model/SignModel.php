<?php
namespace app\panel\model;
use think\exception\DbException;
use think\Model;
use think\exception\PDOException;

class SignModel extends Model
{
    protected $table = 'sign';

    public function getVal($obj, $name)
    {
        return $obj->toArray()[$name];
    }

    public function addsign($data)
    {
        try {
            $where = ['cardNo' => $data['cardNo']];
            if($this->getsign($where)['code']==0 && $where['cardNo']){
                $info = $this->where($where)->update(array('update_time'=>time()));
                return ['code' => 0, 'msg' => 'Success', 'data' => $info];
            }else{
                $info = $this->insertGetId($data);
                if ($info === false) {
                    return ['code' => -1, 'msg' => $this->getError(), 'data' => $info];
                } else {
                    return ['code' => 0, 'msg' => 'Success', 'data' => $data];
                }
            }
        } catch (PDOException $e) {
            return ['code' => -1, 'msg' => $e->getMessage(), 'data' => ''];
        }
    }

    public function getsign($where, $offset=null, $limit=null)
    {
        try {
            $info = $this->where($where)
//                ->limit($offset, $limit)
                ->select();
            if ($info === false) {
                return ['code' => -1, 'msg' => $this->getError(), 'data' => $info];
            } 
            else {
                return ['code' => 0, 'msg' => 'Success', 'data' => $info->toArray()];
            }
        } 
        catch (DbException $e) {
            return ['code' => -1, 'msg' => $e->getMessage(), 'data' => ''];
        }
    }

    public function changestatus($signid, $status)
    {
        try {
            $info = $this->where('id', '=', $signid)->update(array('status'=>$status));
            if ($info === false) {
                return ['code' => -1, 'msg' => $this->getError(), 'data' => $info];
            } 
            else {
                return ['code' => 0, 'msg' => 'Success', 'data' => $info];
            }
        } 
        catch (PDOException $e) {
            return ['code' => -1, 'msg' => $e->getMessage(), 'data' => ''];
        }
    }

    public function getthesign($signid)
    {
        $where = ['id' => $signid];
        try {
            $info = $this->where($where)
                ->find();
            if ($info === false) {
                return ['code' => -1, 'msg' => $this->getError(), 'data' => $info];
            } 
            else {
                return ['code' => 0, 'msg' => 'Success', 'data' => $info];
            }
        } 
        catch (PDOException $e) {
            return ['code' => -1, 'msg' => $e->getMessage(), 'data' => ''];
        }
    }
}