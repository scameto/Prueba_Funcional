<?=view('template/head')?>

<body class="flex flex-col min-h-screen"> <!-- Aplicamos flexbox y min-height a todo el body -->
  <?=view('template/header')?>

  <div class="flex flex-col items-center justify-center flex-grow gap-y-2"> <!-- Aplicamos flexbox y flex-grow para que este div ocupe el espacio restante -->
    <?php echo $this->renderSection('slot') ?>
  </div>

  <?=view('template/footer')?>
</body>

</html>