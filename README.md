# Laravel 12 後臺管理 Google reCAPTCHA Enterprise 登入

詐欺性網站活動每年讓企業損失數十億美元，資安團隊必須將攻擊者阻絕在外，同時確保客戶可以隨時進入網站，有了 reCAPTCHA Enterprise，就能協助網站防範常見的網路式攻擊，例如憑證填充、帳號盜用和內容抓取，也能預防惡意人士或自動化執行程式的攻擊，以免蒙受鉅額損失。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移。
```sh
$ php artisan migrate
```
- 執行安裝 Vite 和 Laravel 擴充套件引用的依賴項目。
```sh
$ npm install
```
- 執行正式環境版本化資源管道並編譯。
```sh
$ npm run build
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/register` 來進行註冊。
- 完成註冊後，可以經由 `/login` 來進行登入。

----

## 畫面截圖
![](https://i.imgur.com/oS2n0df.png)
> 網站的右下角會有 Goolge reCAPTCHA 的標示，讓網站管理者知道 reCAPTCHA 已經啟用了

![](https://i.imgur.com/Bo2TVEi.png)
> 可防止自動化軟體在網站上進行濫用活動
