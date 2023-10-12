<?php require('partials/head.php');   ?>  
<?php require('partials/nav.php');    ?>
<?php require('partials/banner.php'); ?>
<?php
// Логика маршрутов.
// 7. Вызов (require) view из контроллера
// сопровождается загрузкой здесь шаблонных частей страницы.
// Также, здесь прописывается свое уникальное содержимое.
// Также, здесь могут применяться свои переменные,
// подготовленные фунцкией view перед загрузкой этой страницы.
?>

  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <p>Now you are on the About page.</p>
    </div>
  </main>

<?php require('partials/footer.php');  ?>