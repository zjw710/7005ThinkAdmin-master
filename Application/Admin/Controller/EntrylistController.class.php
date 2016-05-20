<?php
namespace Admin\Controller;
use Admin\Controller;
/**
 * 报名管理
 */
class EntrylistController extends BaseController
{
    /**
     * 报名列表
     * @return [type] [description]
     */
    public function index($key="")
    {
        if($key === ""){
            $model = M('Entrylist');  
        }else{
            $where['name'] = array('like',"%$key%");
            $where['telphone'] = array('like',"%$key%");
            $where['sex'] = array('like',"%$key%");
            $where['matchNum'] = array('like',"%$key%");   
            $where['matchZone'] = array('like',"%$key%");                  
            $where['_logic'] = 'or';
            $model = M('Entrylist')->where($where); 
        } 
        
        $count  = $model->where($where)->count();// 查询满足要求的总记录数
        $Page = new \Extend\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $Entrylist = $model->limit($Page->firstRow.','.$Page->listRows)->where($where)->order('id DESC')->select();
        $this->assign('model', $Entrylist);
        $this->assign('page',$show);
        $this->display();     
    }

    /**
     * 添加报名信息
     */
    public function add()
    {

        //默认显示添加表单
        if (!IS_POST) {
            $this->display();
        }
        if (IS_POST) {
            dump(I("post."));
           
            //如果用户提交数据
            $model = D("Entrylist");
            // dump($model);

            if (!$model->create()) {
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error($model->getError());
                exit();
            } else {
                // dump($model->add());
                // exit();
                if ($model->add()) {
                    $this->success("添加成功", U('Entrylist/index'));
                } else {
                    $this->error("添加失败");
                }
            }
        }
    }
    /**
     * 更新报名信息
     * @param  [type] $id [链接ID]
     * @return [type]     [description]
     */
    public function update($id)
    {
    		$id = intval($id);
        //默认显示添加表单
        if (!IS_POST) {
            $model = M('Entrylist')->where("id= %d",$id)->find();
            $this->assign('model',$model);
            $this->display();
        }
        if (IS_POST) {
            $model = D("Entrylist");
            if (!$model->create()) {
                $this->error($model->getError());
            }else{
                if ($model->save()) {
                    $this->success("更新成功", U('Entrylist/index'));
                } else {
                    $this->error("更新失败");
                }        
            }
        }
    }
    /**
     * 删除报名信息
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id)
    {
    		$id = intval($id);
        $model = M('Entrylist');
        $result = $model->delete($id);
        if($result){
            $this->success("删除成功", U('Entrylist/index'));
        }else{
            $this->error("删除失败");
        }
    }
}
