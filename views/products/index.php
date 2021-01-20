<?php
echo '<ul>';
foreach ($products as $product) {
  echo '<li>
    <a href="index.php?controller=users&action=showUser&id=' . $user->id . '">' . $user->name . '</a>
  </li>';
}
echo '</ul>';
?> 