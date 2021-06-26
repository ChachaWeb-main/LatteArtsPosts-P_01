<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>ラテアート新規投稿</title>
    </head>
    <body>
        <h1>☕️あなたのラテアートを皆んなにシェアしよう☕️</h1>
        
        <h3>□ デザイン</h3>
            <input type="text">
        
        <h3>□ 描き方</h3>
            <select>
                <option value="">--選択してください--</option>
                <option value="フリーポア">フリーポア</option>
                <option value="エッチング">エッチング</option>
                <option value="3D">3D</option>
                <option value="その他">その他</option>
            </select>
        
        <h3>□ フリーテキスト</h3>
            <textarea name="body" rows="15">{{ old('body') }}</textarea>
            
        <h3>□ 画像 or 動画</h3>
            <input type="file" name="image">
        
        <h3></h3>    
        <input type="submit" value="投稿">

    </body>
</html>