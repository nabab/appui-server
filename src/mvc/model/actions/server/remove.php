<?php
if ($model->hasData('id', true)) {
  return [
    'success' => $model->inc->options->remove($model->data['id'])
  ];
}
return [
  'success' => false
];
