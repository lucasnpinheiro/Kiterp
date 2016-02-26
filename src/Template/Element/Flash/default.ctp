<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<div class="bg-<?= h($class) ?>"><?= h($message) ?></div>
