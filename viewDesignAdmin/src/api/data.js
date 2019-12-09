import axios from '@/libs/api.request'
import { Message } from 'view-design'
import qs from 'qs'

/**
 * @functionName msgText
 * @param {Object} data 处理对象
 * @param {Boolean} show 成功时显示提示信息
 * @description 处理消息提示
 * @date 2019-09-27 13:39:43
 * @version V1.0.0
 */

const msgText = (data = {
  status: 0
}, show = false) => {
  let msg = ''
  switch (data.status) {
    case -1:
      msg = data.msg || '此操作未授权，请核实！'
      break
    case 20:
      msg = data.msg || '操作成功！'
      break
    case 40:
      msg = data.msg || '操作失败！'
      break
    case 41:
      msg = data.msg || '参数错误！'
      break
    case 42:
      msg = data.msg || '业务逻辑错误！'
      break
    case 50:
      msg = data.msg || '系统错误！'
      break
    default:
      msg = data.msg || '未知错误！'
      break
  }

  if (data.status === 20) {
    if (show) {
      Message.success(msg)
    }
  } else {
    Message.destroy()
    Message.error(msg)
  }
}

/**
 * @functionName api
 * @param {String} url 请求地址
 * @param {Object} data 发送数据
 * @param {Object} config 额外参数{contentType:请求头(url|json),showMsg:是否显示提示信息(true|false)}
 * @description ajax封装
 * @date 2019-02-01 08:33:13
 * @version V1.0.0
 */
export const api = (url = '', data = {}, config = {}) => {
  // 发送的数据类型
  const ContentType = {
    url: 'application/x-www-form-urlencoded;charset=utf-8',
    json: 'application/json;charset=utf-8'
  }

  // 初始化额外参数
  let {
    method = 'post', responseType = 'json', contentType = 'url', showMsg = false
  } = config

  // 处理发送的数据
  let _data
  let _contentType

  switch (contentType) {
    case 'url':
      _data = qs.stringify(data, {
        arrayFormat: 'repeat'
      })
      _contentType = ContentType.url
      break
    case 'json':
      _data = JSON.stringify(data)
      _contentType = ContentType.json
      break
  }

  // 返回ajax方法
  return axios.request({
    url,
    data: _data,
    headers: {
      'Content-Type': _contentType
      // token: getToken() ? getToken() : ''
    },
    method: method,
    responseType: responseType
  }).then(res => {
    // 处理登录超时
    if (res.data.status === 0) {
      localStorage.clear()
      Cookies.remove(TOKEN_KEY)
      Message.destroy()
      Message.error('登录超时!')
      setTimeout(() => {
        router.replace({
          name: 'login'
        })
      }, 1000)
      return false
    }

    msgText(res.data, showMsg)

    return res.data
  })
}

export const getTableData = () => {
  return axios.request({
    url: 'get_table_data',
    method: 'get'
  })
}

export const getDragList = () => {
  return axios.request({
    url: 'get_drag_list',
    method: 'get'
  })
}

export const errorReq = () => {
  return axios.request({
    url: 'error_url',
    method: 'post'
  })
}

export const saveErrorLogger = info => {
  return axios.request({
    url: 'save_error_logger',
    data: info,
    method: 'post'
  })
}

export const uploadImg = formData => {
  return axios.request({
    url: 'image/upload',
    data: formData
  })
}

export const getOrgData = () => {
  return axios.request({
    url: 'get_org_data',
    method: 'get'
  })
}
