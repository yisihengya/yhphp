<?php

//成功 提示
if(!function_exists('success')) {
    function success($mess, $url = ''){
        echo getStr();
        $sstr = <<<EOF
<script type="text/javascript">
    $(function(){
        layer.alert('{$mess}', {
            icon: 1,
            skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
        },function () {
            location.href = '{$url}';
        })
    });
</script>
EOF;
        echo $sstr;
        die;
    }
}


//失败提示
    if(!function_exists('error')) {
        function error($mess){
            echo getStr();
            $sstr = <<<EOF
            <script type="text/javascript">
                $(function(){
                    layer.alert('{$mess}', {
                        icon: 1,
                        skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                    },function () {
                        history.back();
                    })
                });
            </script>
EOF;
            echo $sstr;
            die;
        }
    }
    function getStr(){
        $jq = asset('js/jquery.js');
        $layer = asset('layer/layer.js');
        $str=<<<EOF
<script src="{$jq}"></script>
<script src="{$layer}"></script>
EOF;
        return $str;
    }


//无限极分类
function mytree($arr,$id=0,$level){
    $data=[];
    foreach ($arr as $k => $v) {
        if($v->pid==$id){
            $v->level=$level;
            $data[]=$v;
            $data=array_merge($data,mytree($arr,$v->id,$level+1));
        }
    }
    return $data;
}