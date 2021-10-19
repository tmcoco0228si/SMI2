<?php

//ユーザー入力
$inputs= trim(fgets(STDIN));

//入力の処理
function user_input($inputs){ 

  //「先頭検索、未入力」
    if(!empty($inputs)){
        $keyWord= preg_replace("/\\s.*/u","",$inputs);
        }else{
            echo'入力してください!';
            echo PHP_EOL;
        exit();
    }
    return $keyWord;

}
$keyWord = user_input($inputs);


//タイトル一覧取得
$titles = glob("articles/*.txt");

//テキスト読み込み処理
function check($titles,$keyWord){

    $number = 1;
    echo "Searching for"." "."[ $keyWord ]".PHP_EOL;
    echo "Results".":".PHP_EOL;
   
    foreach ($titles as $title){
          //テキストを取得、$contentsに格納
          $contents = file_get_contents($title);

        //検索キーワード判定
        if(preg_match_all("/\\b$keyWord\\b/i", $contents)){

            //該当したタイトル名の出力,バリデーション「articles/の削除」
            echo $number++ ."." ." ".preg_replace("/articles\\//",'', $title).PHP_EOL;
        }
    }
    //記事の総数
    echo PHP_EOL;
    echo "Total"." : ".$number -=1 ;
    echo PHP_EOL;

    return[$titles,$keyWord];

}
$title = check($titles,$keyWord);

?>