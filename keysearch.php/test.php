<?php 
// articles/morning.txt  = Programming is difficult, but the joy of implementing it is immeasurable.

//ユーザー入力
$keywords= trim(fgets(STDIN));

//入力処理
function user_input($keywords){
   
       //バリデーション「先頭検索、未入力」
       if(!empty($keywords)){
              $keyword = preg_replace("/\\s.*/u","",$keywords);
           }else{
            echo 'キーワードを入力すると記事から「大小問わず、1単語」検索ができます！'."\n";
            echo '例）検索 = The joy'."\n";
            echo '';
            echo '結果 = [ the ]'."\n";

            echo PHP_EOL;
           exit();
       }
       return $keyword;
}
$keyword = user_input($keywords);


//morning.txt内のテキスト取得
$text = file_get_contents('articles/morning.txt');



//検索処理
function search($keyword,$text){

       //キーワード検索「文字完全一致\\b」と「大小問わない /i」
       if (preg_match_all("/\\b$keyword\\b/i", $text)) {

      //正誤出力
              echo "\n";
              echo "Searching for"." "."[ $keyword ]"." "."in test.txt"."\n";
              echo "RESULT:TRUE"."\n";
              echo "\n";
         }else{
              echo "\n";
              echo "Searching for"." "."[ $keyword ]"." "."in test.txt"."\n";
              echo "RESULT: FALSE"."\n";
              echo "\n";
              echo 'キーワードを入力すると記事から「大小問わず、1単語」検索ができます！'."\n";
            echo '例）検索 = The joy'."\n";
            echo '';
            echo '結果 = [ the ]'."\n";

       }
       return[$keyword,$text] ;
}
search($keyword,$text);

?>