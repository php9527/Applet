/*
* 初始化雷区
* $mine这个参数没什么用，因为其他函数对这个参数依赖太深了。
*/
function init($n=12,$line=9,$mine='b'){
    $temp = range(0,$line*$line-1);
    $rand = array_rand($temp,$n);
    $mineFields = [];
    for ($i=0;$i<$line;$i++){
        for($j=0;$j<$line;$j++){
            $t = $i*$line + $j;
            if(in_array($t,$rand)){
                $mineFields[$i][$j] = $mine;
            }else{
                $mineFields[$i][$j] = 0;
            }
        }
    }
    return $mineFields;
}

/*
* 运行程序
*/
function go($arr)
{
    $r = [];
    foreach ($arr as $k=>$ar)
    {
        foreach ($ar as $key=>$a){
            if($a === 'b'){
                $r[$k][$key] = $a;
                continue;
            }
            $r[$k][$key] = countPosition($arr,$k,$key);
        }
    }
    return $r;
}

/*
* 计算雷的数量
*/
function countPosition($arr,$x,$y)
{
    $c  = 0;
    if(isset($arr[$x-1][$y-1])){
        if($arr[$x-1][$y-1] === 'b'){
            $c++;
        }
    }

    if(isset($arr[$x][$y-1])){
        if($arr[$x][$y-1] === 'b'){
            $c++;
        }
    }

    if(isset($arr[$x+1][$y-1])){
        if($arr[$x+1][$y-1] === 'b'){
            $c++;
        }
    }

    if(isset($arr[$x-1][$y])){
        if($arr[$x-1][$y] === 'b'){
            $c++;
        }
    }

    if(isset($arr[$x+1][$y])){
        if($arr[$x+1][$y] === 'b'){
            $c++;
        }
    }

    if(isset($arr[$x-1][$y+1])){
        if($arr[$x-1][$y+1] === 'b'){
            $c++;
        }
    }

    if(isset($arr[$x][$y+1])){
        if($arr[$x][$y+1] === 'b'){
            $c++;
        }
    }

    if(isset($arr[$x+1][$y+1])){
        if($arr[$x+1][$y+1] === 'b'){
            $c++;
        }
    }
    return $c;
}
/*
* 画点
*/
function makePicture($arr)
{
    $table = '<table>';
    foreach ($arr as $ar){
        $table .= '<tr>';
        foreach ($ar as $a){
            if($a === 'b'){
                 $table .= '<td style="color:red;">'.$a.'</td>';
            }else{
                 $table .= '<td>'.$a.'</td>';
            }
        }
        $table .= '</tr>';
    }
    $table .= '</table>';
    return $table;
}

//测试
echo makePicture(go(init()));
