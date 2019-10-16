<?php


namespace app\oj\model;


use think\Exception;
use think\Model;

class DiscussModel extends Model
{
    protected $table = 'discuss';

    public function add_discuss($data)
    {
        try{
            $info = $this->strict(false)->insert($data);
            if($info === false){
                return ['code' => CODE_ERROR, 'msg' => '添加失败', 'data' => ''];
            } else {
                return ['code' => CODE_SUCCESS, 'msg' => '添加成功', 'data' => ''];
            }
        } catch (Exception $e) {
            return ['code' => CODE_ERROR, 'msg' => '数据库错误', 'data' => $e->getMessage()];
        }
    }

    public function update_discuss($data)
    {
        try{
            $info = $this->where('id', $data['id'])->update($data);
            if ($info !== 0) {
                return ['code' => CODE_SUCCESS, 'msg' => '更新成功', 'data' => $info];
            } else {
                return ['code' => CODE_ERROR, 'msg' => '更新失败', 'data' => ''];
            }
        } catch (Exception $e) {
            return ['code' => CODE_ERROR, 'msg' => '数据库错误', 'data' => $e->getMessage()];
        }
    }

    public function get_all_discuss($contest_id)
    {
        try{
            $info = $this->where('contest_id', $contest_id)->select()->toArray();
            return ['code' => CODE_SUCCESS, 'msg' => '查询成功', 'data' => $info];
        } catch (Exception $e) {
            return ['code' => CODE_ERROR, 'msg' => '数据库错误', 'data' => $e->getMessage()];
        }
    }

    public function get_the_discuss($discuss_id)
    {
        try{
            $info = $this->where('id', $discuss_id)->find();
            return ['code' => CODE_SUCCESS, 'msg' => '查询成功', 'data' => $info];
        } catch (Exception $e) {
            return ['code' => CODE_ERROR, 'msg' => '数据库错误', 'data' => $e->getMessage()];
        }
    }

    public function get_user_discuss($user_id, $contest_id)
    {
        try{
            $where = '(`contest_id` = '.$contest_id.' AND `user_id` = '.(string)$user_id.')'.'OR (`contest_id` = '.$contest_id.' AND `status` = 8)';
            $info = $this->where($where)->select()->toArray();
            return ['code' => CODE_SUCCESS, 'msg' => '查询成功', 'data' => $info];
        } catch (Exception $e) {
            return ['code' => CODE_ERROR, 'msg' => '数据库错误', 'data' => $e->getMessage()];
        }
    }
}