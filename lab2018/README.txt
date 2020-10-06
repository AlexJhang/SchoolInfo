1. 功能: 課程資訊閱覽與設定
2. 檔案:
courses.sql: 課程資料表
resources.sql: 布告欄資料表
messages.sql: 留言板資料表
course.php: 課程主頁 -> newsInfo.php: 閱讀詳細消息 -> fileProcessing.php: 檔案下載
                    |
                    -> sendMessage.php: 發送留言
                    
coursesSetting.php: 課程設定(老師才有權限) -> detailSetting.php: 詳細設定 -> result.php: 設定處理(資料庫操作) -> fileProcessing.php(刪除消息/檔案)
                                         |                              ^
                                         -------------------------------| 
menu.html: 測試

3. 資料夾:
uploads: 存放上傳教材
img: 存放大頭貼(留言板使用)
css / stylesheets / js: 存放Bootstrap和CSS套件

