Smarty <hr />
Hellow {$world}
<hr />
{$fon}
{*我是注释哦*}

{use class='yii\web\Controller'}
<hr />
<?=$fon ?>

<hr />
{literal}
    {$fon} <br />
    {use class='yii\web\Controller'}
{/literal}
<hr />

{if $fon eq 'abc'}
    $fon变量为abc
{elseif $fon eq 'fon'}
    $fon变量值为fon
{/if}


<hr />

{foreach $array as $key => $value}
    {$key} : {$value['name']} : {$value.value} <br />
{/foreach}

<hr />

{foreach from=$array key="key" item="value"}
    {$key} : {$value.name} : {$value.value} <br />
{/foreach}

<hr />

{foreach $arrayA as $key => $value}
    {$key} : {$value.name} : {$value.value} <br />
{foreachelse}
    $arrayA木有数据
{/foreach}

<hr />

{section name=value loop=$array}
    {$smarty.section.value.index} : {$array[value].name} : {$array[value].value} <br />
{/section}

<hr />
{section name=value loop=$array start=1}
    {$smarty.section.value.index} : {$array[value].name} : {$array[value].value} <br />
{/section}

<hr />

{section name=value loop=$array start=1}
    {$smarty.section.value.index} : {$array[value].name} : {$array[value].value} <br />
{/section}

<hr />

{section name=value loop=$array step=2}
    {$smarty.section.value.index} : {$array[value].name} : {$array[value].value} <br />
{/section}
