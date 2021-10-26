<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator; //  追加

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        $url->forceScheme('https'); //  追加
        
        // // max_mb ファイルサイズの最大値をメガバイトで指定するvalidationルールを追加する
        // Validator::extend('max_mb', function ($attribute, $value, $parameters, $validator) {
        //     // パラメータ数のチェック
        //     $this->requireParameterCount(1, $parameters, 'max_mb');

        //     // アップロードに成功しているかの判定
        //     if ($value instanceof UploadedFile && ! $value->isValid()) {
        //         return false;
        //     }

        //     // ファイルサイズをMBに変換
        //     $megaBytes = $value->getSize() / 1024 / 1024;

        //     // $parametersにルールで設定した引数より小さければ問題なし
        //     return $megaBytes <= $parameters[0];
        // });

        // // validationメッセージ「The :attribute may not be greater than :max_mb megabytes.」の
        // // 「:max_mb」部分をパラメータとして与えられた値と置き換える
        // Validator::replacer('max_mb', function ($message, $attribute, $rule, $parameters) {
        //     return str_replace(':max_mb', $parameters[0], $message);
        // });
        
    }
    
    // /**
    //  * ルールに与えられるパラメータ数のチェックを行う
    //  *
    //  * @param integer $count
    //  * @param array $parameters
    //  * @param string $rule
    //  * @return void
    //  */
    // protected function requireParameterCount($count, $parameters, $rule)
    // {
    //     if (count($parameters) < $count) {
    //         throw new InvalidArgumentException("Validation rule $rule requires at least $count parameters.");
    //     }
    // }
}
