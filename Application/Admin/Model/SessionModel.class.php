<?php
namespace Admin\Model;
use Think\Model;
class SessionModel extends Model{
    protected $_validate = array(
    	
        array('matchnum','require','请填写比赛场次序号！'), //默认情况下用正则进行验证
        array('matchzone','require','请填写赛区！'), //默认情况下用正则进行验证
        array('matchtime','require','请填写比赛时间'), //默认情况下用正则进行验证

    ); 
}