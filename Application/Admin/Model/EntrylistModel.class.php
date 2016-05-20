<?php
namespace Admin\Model;
use Think\Model;
class EntrylistModel extends Model{
    protected $_validate = array(
        array('name','require','请填写姓54161名！'), //默认情况下用正则进行验证
        array('telphone','require','请填写电话号码！'), //默认情况下用正则进行验证
        array('telphone','11','电话长度不符！',3,'length'), // 验证电话号码长度
        array('email','require','请填写邮箱'), //默认情况下用正则进行验证
        array('email','email','邮箱格式错误！'), //默认情况下用正则进行验证
        array('matchnum','require','请填写比赛场次序号'), //默认情况下用正则进行验证
        array('matchzone','require','请填写赛区'), //默认情况下用正则进行验证
    );
}