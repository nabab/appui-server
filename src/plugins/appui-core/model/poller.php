<?php
return [[
  'id' => 'appui-server-0',
  'frequency' => 3,
  'function' => function(array $data){
    $res = [
      'success' => true,
      'data' => []
    ];
    if (isset($data['data'])) {
      $running = \bbn\Appui\Server::getRunningTasks();
      $runningHash = md5(json_encode($running));
      if (isset($data['data']['runningTasksHash'])
        && ($runningHash !== $data['data']['runningTasksHash'])
      ) {
        $res['data'] = [
          'runningTasks' => $running,
          'serviceWorkers' => [
            'runningTasksHash' => $runningHash
          ]
        ];
      }
      $queue = \bbn\Appui\Server::getCurrentTasksQueue();
      $queueHash = md5(json_encode($queue));
      if (isset($data['data']['tasksQueueHash'])
        && ($queueHash !== $data['data']['tasksQueueHash'])
      ) {
        $res['data']['tasksQueue'] = $queue;
        if (!isset($res['data']['serviceWorkers'])) {
          $res['data']['serviceWorkers'] = [];
        }
        $res['data']['serviceWorkers']['tasksQueueHash'] = $queueHash;
      }
    }
    return $res;
  }
]];