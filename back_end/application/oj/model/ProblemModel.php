<?php
/**
 * Created by PhpStorm.
 * User: DarkKris
 * Date: 2019/2/26
 * Time: 下午12:47
 */
namespace app\oj\model;

use think\Exception;
use think\Model;

class ProblemModel extends Model {

    // uncheck

    protected $table = 'problem';

    public function searchProblem($problem_id) {
        try{
            $content = $this->where('problem_id',$problem_id)->find();
            if($content){
                return ['code'=>CODE_SUCCESS,'msg'=>'查找成功','data'=>$content];
            }else{
                return ['code'=>CODE_ERROR,'msg'=>'查找失败','data'=>''];
            }
        }catch(Exception $e){
            return ['code'=>CODE_ERROR,'msg'=>'数据库错误','data'=>$e->getMessage()];
        }
    }

    /**
     * @param $data: $title, $background, $describe, $input_format, $output_format, $hint, $public(boolean), $source, $tag
     * @return array
     */
    public function addProblem($data) {
        try{
            $res = $this->insert($data);
            if($res){
                return ['code'=>CODE_SUCCESS,'msg'=>'添加成功','data'=>''];
            }else{
                return ['code'=>CODE_ERROR,'msg'=>'添加失败','data'=>''];
            }
        }catch(Exception $e){
            return ['code'=>CODE_ERROR,'msg'=>'数据库错误','data'=>$e->getMessage()];
        }
    }

    public function deleProblem($problem_id) {
        try{
            $res = $this->where('problem_id',$problem_id)->delete();
            if($res){
                return ['code'=>CODE_SUCCESS,'msg'=>'删除成功','data'=>''];
            }else{
                return ['code'=>CODE_ERROR,'msg'=>'删除失败','data'=>''];
            }
        }catch(Exception $e){
            return ['code'=>CODE_ERROR,'msg'=>'数据库错误','data'=>$e->getMessage()];
        }
    }

    public function editProblem($problem_id, $data) {
        try{
            $res = $this->where('problem_id',$problem_id)->update($data);
            if($res){
                return ['code'=>CODE_SUCCESS,'msg'=>'编辑成功','data'=>''];
            }else{
                return ['code'=>CODE_ERROR,'msg'=>'编辑失败','data'=>''];
            }
        }catch(Exception $e){
            return ['code'=>CODE_ERROR,'msg'=>'数据库错误','data'=>$e->getMessage()];
        }
    }
}