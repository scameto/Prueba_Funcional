<!-- template/errors -->

<?php if (session()->get('errors')): ?>
    <ul  class="flex flex-wrap gap-2 bg-red-400/50 text-white font-bold py-2 px-4 mb-2 mt-8 mx-auto min-w-screen max-w-screen-md  rounded-md justify-center">
        <?php foreach (session()->get('errors') as $field => $error): ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>
<?php endif ?>