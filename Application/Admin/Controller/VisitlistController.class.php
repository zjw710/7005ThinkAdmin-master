<?php
namespace Admin\Controller;
use Admin\Controller;
/**
 * 用户访问记录管理
 */
class VisitlistController extends BaseController
{
    /**
     * 用户访问记录列表
     * @return [type] [description]
     */
    public function index($key="")
    {
        if($key === ""){
            $model = M('Visitlist');  
        }else{
            $where['title'] = array('like',"%$key%");
            $where['url'] = array('like',"%$key%");
            $where['_logic'] = 'or';
            $model = M('Visitlist')->where($where); 
        } 
        
        $count  = $model->where($where)->count();// 查询满足要求的总记录数
        $Page = new \Extend\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $Visitlist = $model->limit($Page->firstRow.','.$Page->listRows)->where($where)->order('id DESC')->select();
        $this->assign('model', $Visitlist);
        $this->assign('page',$show);
        $this->display();     
    }

    /**
     * 添加用户访问记录
     */
    public function add()
    {
        //默认显示添加表单
        if (!IS_POST) {
            $this->display();
        }
        if (IS_POST) {
            //如果用户提交数据
            $model = D("Visitlist");
            if (!$model->create()) {
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error($model->getError());
                exit();
            } else {
                if ($model->add()) {
                    $this->success("链接添加成功", U('Visitlist/index'));
                } else {
                    $this->error("链接添加失败");
                }
            }
        }
    }
    /**
     * 更新用户访问记录信息
     * @param  [type] $id [链接ID]
     * @return [type]     [description]
     */
    public function update($id)
    {
    		$id = intval($id);
        //默认显示添加表单
        if (!IS_POST) {
            $model = M('Visitlist')->where("id= %d",$id)->find();
            $this->assign('model',$model);
            $this->display();
        }
        if (IS_POST) {
            $model = D("Visitlist");
            if (!$model->create()) {
                $this->error($model->getError());
            }else{
                if ($model->save()) {
                    $this->success("更新成功", U('Visitlist/index'));
                } else {
                    $this->error("更新失败");
                }        
            }
        }
    }
    /**
     * 删除用户访问记录
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id)
    {
    		$id = intval($id);
        $model = M('Visitlist');
        $result = $model->delete($id);
        if($result){
            $this->success("链接删除成功", U('Visitlist/index'));
        }else{
            $this->error("链接删除失败");
        }
    }
}
