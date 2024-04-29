<?php echo $this->extend('layouts/layout') ?>
<?php echo $this->section('slot') ?>

<h1>Listado de Alojamiento</h1>
<a href="<?=base_url('alojamiento/create')?>">Crear Nuevo Alojamiento</a>

<?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success" role="alert">
        <?=session()->getFlashdata('message')?>
    </div>
<?php endif;?>

<table class="min-w-full divide-y divide-gray-200">
    <thead>
        <tr>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Identificador
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Tipo Alojamiento
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Precio Día
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Cantidad Personas
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Estado del Alojamiento
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Dueño
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        <!-- Aquí van los datos de la tabla -->
    </tbody>
</table>

<?php echo $this->endSection() ?>