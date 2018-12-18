<?php
/*
$array=[
    'test'=>'test data',
    'test2'=>'test2 data',
    'test3'=>[
        'testarray'=>'arraydata',
        'testarray2'=> [
            'test2array'=>'test2 array in valuesi'
        ]
    ]
];

function arraydeBul($array,$anahtar)
{
        
        foreach($array as $key=>$val)
        {
          if($key==$anahtar)
          {
              return $val;
          }elseif(is_array($val))
          {
              $t=arraydeBul($val,$anahtar);
              return $t;
          }
          
        }              
    
    return "ANAHTAR BULUNAMADI";
}
echo arraydeBul($array,'test');
*/


?>