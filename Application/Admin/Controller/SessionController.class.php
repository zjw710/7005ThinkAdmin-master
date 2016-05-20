<?php
namespace Admin\Controller;
use Admin\Controller;
/**
 * 比赛场次管理
 */
class SessionController extends BaseController
{
    /**
     * 比赛场次列表
     * @return [type] [description]
     */
    public function index($key="")
    {
        if($key === ""){
            $model = M('Session');  
        }else{
            $where['matchnum'] = array('like',"%$key%");
            $where['matchzone'] = array('like',"%$key%");
            $where['_logic'] = 'or';
            $model = M('Session')->where($where); 
        } 
        
        $count  = $model->where($where)->count();// 查询满足要求的总记录数
        $Page = new \Extend\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $Session = $model->limit($Page->firstRow.','.$Page->listRows)->where($where)->order('id DESC')->select();
        //echo "string";
        //dump("test");
        //exit();
        // dump($Session);exit;
        $this->assign('model', $Session);
        $this->assign('page',$show);
        $this->display();     
    }

    /**
     * 添加比赛场次
     */
    public function add()
    {

        //默认显示添加表单
        if (!IS_POST) {
            $this->display();
        }
        if (IS_POST) {
            //如果用户提交数据
            $model = D("Session");
            // dump($model);
            // exit();
            if (!$model->create()) {
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error($model->getError());
                exit();
            } else {
                if ($model->add()) {
                    $this->success("比赛场次添加成功", U('Session/index'));
                } else {
                    $this->error("比赛场次添加失败");
                }
            }
        }
    }
    /**
     * 更新比赛场次
     * @param  [type] $id [链接ID]
     * @return [type]     [description]
     */
    public function update($id)
    {
    		$id = intval($id);
        //默认显示添加表单
        if (!IS_POST) {
            $model = M('Session')->where("id= %d",$id)->find();
            $this->assign('model',$model);
            $this->display();
        }
        if (IS_POST) {
            $model = D("Session");

            if (!$model->create()) {
                $this->error($model->getError());
            }else{
                // dump($model);exit;
                // $data['id'] = 1;
                // $data['matchnum'] = 5;
                // $data['matchzone'] = 'ThinkPHP';
                // $data['matchtime'] = '2016-04-18 00:46:09';
                if ($model->save()) {
                    $this->success("更新成功", U('Session/index'));
                } else {
                    $this->error("更新失败");
                }        
            }
        }
    }
    /**
     * 删除比赛场次信息
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id)
    {
    		$id = intval($id);
        $model = M('Session');
        $result = $model->delete($id);
        if($result){
            $this->success("链接删除成功", U('Session/index'));
        }else{
            $this->error("链接删除失败");
        }
    }
}
