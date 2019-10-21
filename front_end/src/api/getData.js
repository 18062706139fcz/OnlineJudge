import fetch from '../config/fetch';

// 用户逻辑

/**
 * 登陆
 */

export const login = data => fetch('/Login/do_login', 'post', data);

/**
 * 登出
 */

export const logout = () => fetch('/Login/do_logout', 'post', {});

/**
 * 注册
 */

export const register = data => fetch('/Register/register', 'post', data);




// 业务逻辑

/**
 * 获取公告列表
 */

export const getNotice = () => fetch('/Index/notice');

/**
 * 获取滚动图列表
 */

export const getCarousel = () => fetch('/Index/rotation');

/**
 * 获取日常数据(十三天内的提交量/通过量)
 */

export const getDailydata = () => fetch('/Index/data');

/**
 * 获取PV数据（百度统计API）
 */

export const getPvData = (data, header) => fetch('https://api.baidu.com/json/tongji/v1/ReportService/getData', 'post', data, header);




// 题目逻辑

/**
 * 获取题目列表
 */

export const getProblemList = () => fetch('/Problem/displayAllProblem');

/**
 * 获取题目信息
 */

export const getProblem = data => fetch('/Problem/displayProblem', 'post', data);




// 比赛逻辑

/**
 * 获取比赛列表
 */

export const getContestList = () => fetch('/Contest/getAllContest');

/**
 * 获取比赛详情
 */

export const getContest = data => fetch('/Contest/getTheContest', 'post', data);




// 讨论板

/**
 * 获取某场比赛的讨论列表
 */

export const getDiscussList = data => fetch('/discuss/getAlldiscuss', 'post', data);

/**
 * 获取某场比赛的某个讨论内容
 */

export const getDiscussDetail = data => fetch('/discuss/getThediscuss', 'post', data);




// 状态

/**
 * 获取提交返回
 */

export const getSubmitInfo = data => fetch('/submit/get_submit_info', 'post', data);




// Test

/**
 * Twitter API
 * close VPN to test timeout
 */

export const testRequest = () => fetch('https://analytics.twitter.com/tpm/p?_=1571277967228');
