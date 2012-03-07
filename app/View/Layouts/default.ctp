<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>TASK MATCHER</title>
	<meta name="description" content="TASK MATCHERは、「あれしてほしい。その代わりこれするよ」を気軽にできるようにするサービスです。">
	<?php
		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-responsive.min');
		echo $this->Html->css('common');
		echo $this->Html->script('jquery-1.7.1.min');
		echo $this->Html->script('bootstrap.min');

	?>
</head>
<body>
<!--

このプロジェクトは、もともとは作者の就職活動の課題用に作ったものです。
このプロジェクトはオープンソースになっています。
ソースコードはgithubに公開してあります。
ライセンスはMITライセンスとなっています。
ですので、下記作者情報を削除しない限り、自由に利用していただいて構いません。
また、このプログラムの実行によって発生した損害や問題に対して、
作者は責任を負わないものとします。

github : 

【使用フレームワーク】
・CakePHP 2.0.6

【動作確認済の環境】
言語　　　　　：PHP 5.3.8
DB　　　　　　：MySQL 5.5.19
OS　　　　　　：Mac OS X 10.7.3

【作者情報】
作者　　　　　：菅沼 大悟(Daigo Suganuma)
作者連絡先　　：dragonmind2002あっとyahoo.co.jp
twitter 　　　：@FrankensteinDai

//-->
    <div id="header">
        <div class="navbar" style="text-align: left;">
            <div class="navbar-inner">
                <div class="container">
			        <h1 class="headerTitle"><?php echo $this->Html->link('TASK MATCHER', '/'); ?></h1>
                    <div class="nav pull-right" style="height:40px;">
                    <?php if (is_null($id)) { ?>
                    <form action="/users/login" method="post" accept-charset="utf-8">
                    <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
                    <span style="color:#fff">username:</span><input name="data[User][username]" type="text" style="margin-top:6px; width:80px;"/>
                    <span style="color:#fff">password:</span><input name="data[User][password]" type="password" style="margin-top:6px; width:80px;"/>
                    <input type="submit" class="btn" value="ログイン" style="margin-top:6px;"> 
                    </form>

                    <?php } else { ?>
                    <form action="/users/logout" method="post" accept-charset="utf-8">
                    <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
                    <input type="submit" class="btn" value="ログアウト">
                    </form>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
	</div>
    <div class="container" style="text-align: center;">
	<div class="flasharea"><?php echo $this->Session->flash(); ?></div>
    <div class="container-fluid" style="text-align: center;">
        <?php echo $content_for_layout; ?>
	</div>
    </div>
	<div id="footer">
	</div>
</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
