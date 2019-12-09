/* eslint-disable no-shadow-restricted-names */
// eslint-disable-next-line no-unused-vars
const config = (function (global, undefined) {
  let config = {}
  /**
     * @description 配置显示在浏览器标签的title
     */
  config.title = 'iView-admin'
  /**
   * @description token在Cookie中存储的天数，默认1天
   */
  config.cookieExpires = 1
  /**
   * @description 是否使用国际化，默认为false
   *              如果不使用，则需要在路由中给需要在菜单中展示的路由设置meta: {title: 'xxx'}
   *              用来在菜单中显示文字
   */
  config.useI18n = true
  /**
   * @description api请求基础路径
   */
  config.baseUrl = {
    dev: 'http://localhost/inDataPhp/',
    pro: 'http://localhost/inDataPhp/'
  },
    /**
     * @description 默认打开的首页的路由name值，默认为home
     */
    config.homeName = 'home'
  /**
   * @description 需要加载的插件
   */
  config.plugin = {
    'error-store': {
      showInHeader: true, // 设为false后不会在顶部显示错误日志徽标
      developmentOff: true // 设为true后在开发环境不会收集错误信息，方便开发中排查错误
    }
  }
  global.config = config
  return config
}(typeof window !== 'undefined' ? window : this))
