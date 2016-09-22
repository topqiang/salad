<?php
return  array(
    /* 项目设定 */
    'APP_STATUS'            => 'debug',  // 应用调试模式状态 调试模式开启后有效 默认为debug 可扩展 并自动加载对应的配置文件
    'APP_FILE_CASE'         => false,   // 是否检查文件的大小写 对Windows平台有效
    'APP_AUTOLOAD_PATH'     => '@.AutoLoad',// 自动加载机制的自动搜索路径,注意搜索顺序
    'APP_TAGS_ON'           => true, // 系统标签扩展开关
    'APP_SUB_DOMAIN_DEPLOY' => false,   // 是否开启子域名部署
    'APP_SUB_DOMAIN_RULES'  => array(), // 子域名部署规则
    'APP_SUB_DOMAIN_DENY'   => array(), //  子域名禁用列表
    'ACTION_SUFFIX'         =>  '', // 操作方法后缀
    'MODULE_ALLOW_LIST'     => array('Home','Admin','Api'),
    'DEFAULT_GROUP'         => 'Home', //默认分组
    'SHOW_PAGE_TRACE'       => true,
    /* Cookie设置 */
    'COOKIE_EXPIRE'         => 0,    // Coodie有效期
    'COOKIE_DOMAIN'         => '',      // Cookie有效域名
    'COOKIE_PATH'           => '/',     // Cookie路径
    'COOKIE_PREFIX'         => '',      // Cookie前缀 避免冲突

    /* 数据库设置 */
    'DB_TYPE'               => 'mysql',     // 数据库类型
    'DB_HOST'               => 'localhost', // 服务器地址
    'DB_NAME'               => 'shala',          // 数据库名
    'DB_USER'               => 'root',      // 用户名
    'DB_PWD'                => '',          // 密码
    'DB_PORT'               => '3306',        // 端口
    'DB_PREFIX'             => 'shala_',    // 数据库表前缀
    'DB_FIELDTYPE_CHECK'    => false,       // 是否进行字段类型检查
    'DB_FIELDS_CACHE'       => true,        // 启用字段缓存
    'DB_CHARSET'            => 'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        => 0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        => false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'         => 1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO'           => '', // 指定从服务器序号
    'DB_SQL_BUILD_CACHE'    => false, // 数据库查询的SQL创建缓存
    'DB_SQL_BUILD_QUEUE'    => 'file',   // SQL缓存队列的缓存方式 支持 file xcache和apc
    'DB_SQL_BUILD_LENGTH'   => 20, // SQL缓存的队列长度
    'DB_SQL_LOG'            => false, // SQL执行日志记录

    /* 数据缓存设置 */
    'DATA_CACHE_TIME'       => 0,      // 数据缓存有效期 0表示永久缓存
    'DATA_CACHE_COMPRESS'   => false,   // 数据缓存是否压缩缓存
    'DATA_CACHE_CHECK'      => false,   // 数据缓存是否校验缓存
    'DATA_CACHE_PREFIX'     => '',     // 缓存前缀
    'DATA_CACHE_TYPE'       => 'File',  // 数据缓存类型,支持:File|Db|Apc|Memcache|Shmop|Sqlite|Xcache|Apachenote|Eaccelerator
    'DATA_CACHE_PATH'       => TEMP_PATH,// 缓存路径设置 (仅对File方式缓存有效)
    'DATA_CACHE_SUBDIR'     => false,    // 使用子目录缓存 (自动根据缓存标识的哈希创建子目录)
    'DATA_PATH_LEVEL'       => 1,        // 子目录缓存级别

    /* 错误设置 */
    'ERROR_MESSAGE'         => '页面错误！请稍后再试～',//错误显示信息,非调试模式有效
    'ERROR_PAGE'            => '',	// 错误定向页面
    'SHOW_ERROR_MSG'        => true,    // 显示错误信息
    'TRACE_EXCEPTION'       => false,   // TRACE错误信息是否抛异常 针对trace方法

    /* 日志设置 */
    'LOG_RECORD'            => false,   // 默认不记录日志
    // 'LOG_TYPE'              => 1, // 日志记录类型 0 系统 1 邮件 3 文件 4 SAPI 默认为文件方式
    'LOG_DEST'              => '', // 日志记录目标
    'LOG_EXTRA'             => '', // 日志记录额外信息
    'LOG_LEVEL'             => 'EMERG,ALERT,CRIT,ERR',// 允许记录的日志级别
    'LOG_FILE_SIZE'         => 2097152,	// 日志文件大小限制
    'LOG_EXCEPTION_RECORD'  => false,    // 是否记录异常信息日志

    /* SESSION设置 */
    'SESSION_AUTO_START'    => true,    // 是否自动开启Session
    'SESSION_OPTIONS'       => array(), // session 配置数组 支持type name id path expire domain 等参数
    'SESSION_TYPE'          => '', // session hander类型 默认无需设置 除非扩展了session hander驱动
    'SESSION_PREFIX'        => '', // session 前缀
    //'VAR_SESSION_ID'      => 'session_id',     //sessionID的提交变量

    /* 模板引擎设置 */
    'TMPL_CONTENT_TYPE'     => 'text/html', // 默认模板输出类型
    'TMPL_ACTION_ERROR'     => THINK_PATH.'Tpl/dispatch_jump1.tpl', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   => THINK_PATH.'Tpl/dispatch_jump1.tpl', // 默认成功跳转对应的模板文件
    //'TMPL_EXCEPTION_FILE'   => THINK_PATH.'Tpl/think_exception.tpl',// 异常页面的模板文件
    'TMPL_DETECT_THEME'     => false,       // 自动侦测模板主题
    'TMPL_FILE_DEPR'        =>  '/', //模板文件MODULE_NAME与ACTION_NAME之间的分割符
    //定义模板变量
    'TMPL_PARSE_STRING'     => array(
        '__WEBROOT__' => __ROOT__,
        '__WEBPUBLIC__' => __ROOT__.'/Public',
    ),

    /* URL设置 */
    'URL_CASE_INSENSITIVE'  => false,   // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'             => 3,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式，提供最好的用户体验和SEO支持
    'URL_PATHINFO_DEPR'     => '/',	// PATHINFO模式下，各参数之间的分割符号
    'URL_PATHINFO_FETCH'    =>   'ORIG_PATH_INFO,REDIRECT_PATH_INFO,REDIRECT_URL', // 用于兼容判断PATH_INFO 参数的SERVER替代变量列表
    'URL_HTML_SUFFIX'       => '',  // URL伪静态后缀设置
    'URL_DENY_SUFFIX'       =>  'ico|png|gif|jpg', // URL禁止访问的后缀设置
    'URL_PARAMS_BIND'       =>  true, // URL变量绑定到Action方法参数
    'URL_404_REDIRECT'      =>  '', // 404 跳转页面 部署模式有效

    /* 系统变量名称设置 */
    'VAR_GROUP'             => 'g',     // 默认分组获取变量
    'VAR_MODULE'            => 'm',		// 默认模块获取变量
    'VAR_ACTION'            => 'a',		// 默认操作获取变量
    'VAR_AJAX_SUBMIT'       => 'ajax',  // 默认的AJAX提交变量
    'VAR_JSONP_HANDLER'     => 'callback',
    'VAR_PATHINFO'          => 's',	// PATHINFO 兼容模式获取变量例如 ?s=/module/action/id/1 后面的参数取决于URL_PATHINFO_DEPR
    'VAR_URL_PARAMS'        => '_URL_', // PATHINFO URL参数变量
    'VAR_TEMPLATE'          => 't',		// 默认模板切换变量
    'VAR_FILTERS'           =>  'filter_exp',     // 全局系统变量的默认过滤方法 多个用逗号分割

    'OUTPUT_ENCODE'         =>  false, // 页面压缩输出
    'HTTP_CACHE_CONTROL'    =>  'private', // 网页缓存控制

    //扩展配置
    'LOAD_EXT_CONFIG'       => 'extra_config',
    //'LOAD_EXT_FILE'         => '',

    //验证邮箱
    'EMAIL'                 => '/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/',
    //验证手机号
    //'MOBILE'                => '/^((0?1\d{10})|((0(10|2[1-3]|[3-9]\d{2}))?[1-9]\d{6,7}))$/',
    //'MOBILE'                => '/^((0?1[3578]\d{9})|((0(10|2[1-3]|[3-9]\d{2}))?[1-9]\d{6,7}))$/',
      //'MOBILE'                => '/^0?(13[0-9]|17[0-9]|15[012356789]|18[02356789]|14[57])[0-9]{8}$/',
     'MOBILE'                => '/^0?(13[0-9]|17[0-9]|15[012356789]|18[02356789]|14[57])[0-9]{8}$/',
    //验证固话号
    'PHONE'                 => '/^\d{3,4}-\d{7,8}(-\d{3,4})?$/',
    //日期格式验证
    'DATE'                  => '/^\d{4}\-\d{2}\-\d{2}$/',
    //时间格式验证
    'TIME'                  => '/^(0\d{1}|1\d{1}|2[0-3]):([0-5]\d{1})$/',
    'NETURL'                => '/http(s)?:\/\/([\w-]+\.)+[\w-]+(\/[\w- .\/?%&=]*)?/',
    //api路径
    'API_URL'               => 'http://weixin.genduanzi.com',
);

