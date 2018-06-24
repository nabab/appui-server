<?php
$arr = [];
if ( !empty($model->inc->vm) &&
  !empty($model->data['server']) &&
  !empty($model->data['domain'])
){
  $sub_domains = $model->inc->vm->list_domains();
  foreach($sub_domains as $ele){
    if( !empty($ele['values']['parent_domain']) &&
     ($ele['values']['parent_domain'][0] === $model->data['domain']) &&
     ($ele['values']['type'][0] === "Sub-server")
    ){
      array_push($arr, [
        'sub_domains' => $ele['name'],
        'created' => $ele['values']['created_on'][0],
        'disabled' => !empty($ele['values']['disabled']) ? true : false,
        'total_info' => $ele['values'],        
      ]);
    }
  };
}
return [
  'data' => $arr
];
