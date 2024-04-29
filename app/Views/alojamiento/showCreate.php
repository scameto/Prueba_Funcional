<?php echo $this->extend('layouts/layout') ?>
<?php echo $this->section('slot') ?>

<style>

</style>

<div>

</div>

<form action="<?= base_url('alojamiento/create')?>" method="post" class="flex flex-row w-5/6">
    <section class="w-1/2">
        <h1 class="text-xl w-fit px-3 py-1 m-3 border-solid border-2 rounded-full border-red-300">Registro de
            Alojamiento</h1>
        <h2 class="text-xl px-3 py-0 m-3 mt-8 border-l-4 border-blue-500">Información</h2>
        <label for="aloj_nombre" class="block text-xl px-3 py-0 mx-3">Nombre</label>
        <input id="aloj_nombre" type="text" class="text-xl px-3 py-0 mx-3 border-b-2" placeholder="Escribir aqui">
        <label for="aloj_precioDia" class="block text-xl px-3 py-0 mx-3">Precio Dia</label>
        <input id="aloj_precioDia" oninput="checkInputNumber({evt:event, input:this})" type="text"
            class="text-xl px-3 py-0 mx-3 border-b-2" placeholder="Escribir aqui">
        <label for="aloj_cantidadPersonas" class="block text-xl px-3 py-0 mx-3">Capacidad de Personas</label>
        <input id="aloj_cantidadPersonas" oninput="checkInputNumber({evt:event, input:this, regex: /^\d*$/})"
            type="text" class="text-xl px-3 py-0 mx-3 border-b-2" placeholder="Escribir aqui">
        <label for="aloj_tipoAlojamiento" class="block text-xl px-3 py-0 mx-3">Tipo de Alojamiento</label>
        <select id="aloj_tipoAlojamiento" class="text-xl px-3 py-0 mx-3 border-b-2 bg-transparent">
            <option value="habitacion">Habitacion</option>
            <option value="compartida">Compartida</option>
            <option value="unica">Unica</option>
        </select>

        <h2 class="text-xl px-3 py-0 m-3 mt-8 border-l-4 border-blue-500">Precios</h2>
        <div class="p-3 flex items-center">
            <label class="inline-flex items-center space-x-2 mr-8" for="isPrecioGeneral">
                <input type="radio" name="preciosRadio" id="isPrecioGeneral" checked
                    class="h-5 w-5 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                <span class="text-gray-700">Precio General</span>
            </label>
            <input type="number"
                class="pl-8 block px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-400">
        </div>
        <div class="p-3">
            <label class="flex items-center space-x-2 mr-8" for="isPrecioIndividual">
                <input type="radio" name="preciosRadio" id="isPrecioIndividual"
                    class="h-5 w-5 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                <span class="text-gray-700">Precio Individual</span>
            </label>
            <div class="relative z-0 inline-block mt-3 mr-3">
                <input type="text" id="precioLunesToJueves"
                    class="block py-2.5 px-0 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="precioLunesToJueves"
                    class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Lunes
                    a jueves</label>
            </div>
            <div class="relative z-0 inline-block mt-3">
                <input type="text" id="precioViernesToDomingo"
                    class="block py-2.5 px-0 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="precioViernesToDomingo"
                    class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Viernes
                    a Domingo</label>
            </div>
        </div>

        <h2 class="text-xl px-3 py-0 m-3 mt-8 border-l-4 border-blue-500">Fechas Especiales</h2>
        <div class="flex m-3 flex-col gap-y-16 rounded-3xl p-2">
            <div class="w-10/12 flex flex-col items-center">
                <div class="w-full flex justify-between items-center px-2">
                    <input type="text"
                        class="w-4/6 py-2.5 px-0 text-gray-900 bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder="Ingrese el nombre" />
                    <span class="text-lg mx-2">x</span>
                    <input type="text"
                        class="w-1/6 py-2.5 px-0 text-gray-900 bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                </div>

                <div class="relative w-full flex justify-between px-2">
                    <div class="w-5/12 relative">
                        <input type="date"
                            class="w-full text-right py-2.5 px- text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 relative z-10"
                            placeholder="" />
                        <label
                            class="absolute top-1/2 left-1 transform -translate-y-1/2 text-black text-lg">Inicio</label>
                    </div>
                    <div class="w-5/12 relative">
                        <input type="date"
                            class="w-full text-right py-2.5 px- text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 relative z-10"
                            placeholder="" />
                        <label class="absolute top-1/2 left-1 transform -translate-y-1/2 text-black text-lg">Fin</label>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w-1/2">
        <h1 class="invisible text-xl w-fit px-3 py-1 m-3 border-solid border-2 rounded-full border-red-300">Registro de
            Alojamiento</h1>
        <h2 class="text-xl px-3 py-0 m-3 mt-8 border-l-4 border-blue-500">Añadir fotos</h2>


        <div class="flex justify-between px-6">
            <!-- Primer input de imagen -->
            <div class="relative border-solid border-2 border-gray-300 rounded-lg">
                <label for="image-upload-1"
                    class="w-24 h-24 rounded-lg flex items-center justify-center cursor-pointer hover:bg-red-300 transition duration-300">
                    <span class="text-4xl z-20">+</span>
                </label>
                <input type="file" class="hidden" id="image-upload-1" accept="image/*"
                    onchange="previewImage(event, 'image-preview-1')">
                <div class="image-container w-24 h-24 absolute z-10">
                    <img id="image-preview-1" class="image-preview hidden w-24 h-24 -mt-24" src="#"
                        alt="Vista previa de la imagen">
                </div>
            </div>

            <!-- Segundo input de imagen -->
            <div class="relative border-solid border-2 border-gray-300 rounded-lg">
                <label for="image-upload-2"
                    class="w-24 h-24 rounded-lg flex items-center justify-center cursor-pointer hover:bg-red-300 transition duration-300">
                    <span class="text-4xl z-20">+</span>
                </label>
                <input type="file" class="hidden" id="image-upload-2" accept="image/*"
                    onchange="previewImage(event, 'image-preview-2')">
                <div class="image-container w-24 h-24 absolute z-10">
                    <img id="image-preview-1" class="image-preview hidden w-24 h-24 -mt-24" src="#"
                        alt="Vista previa de la imagen">
                </div>
            </div>

            <!-- Tercer input de imagen -->
            <div class="relative border-solid border-2 border-gray-300 rounded-lg">
                <label for="image-upload-3"
                    class="w-24 h-24 rounded-lg flex items-center justify-center cursor-pointer hover:bg-red-300 transition duration-300">
                    <span class="text-4xl z-20">+</span>
                </label>
                <input type="file" class="hidden" id="image-upload-3" accept="image/*"
                    onchange="previewImage(event, 'image-preview-3')">
                <div class="image-container w-24 h-24 absolute z-10">
                    <img id="image-preview-1" class="image-preview hidden w-24 h-24 -mt-24" src="#"
                        alt="Vista previa de la imagen">
                </div>
            </div>

            <!-- Cuarto input de imagen -->
            <div class="relative border-solid border-2 border-gray-300 rounded-lg">
                <label for="image-upload-4"
                    class="w-24 h-24 rounded-lg flex items-center justify-center cursor-pointer hover:bg-red-300 transition duration-300">
                    <span class="text-4xl z-20">+</span>
                </label>
                <input type="file" class="hidden" id="image-upload-4" accept="image/*"
                    onchange="previewImage(event, 'image-preview-4')">
                <div class="image-container w-24 h-24 absolute z-10">
                    <img id="image-preview-1" class="image-preview hidden w-24 h-24 -mt-24" src="#"
                        alt="Vista previa de la imagen">
                </div>
            </div>
        </div>


        <h2 class="text-xl px-3 py-0 m-3 mt-8 border-l-4 border-blue-500">Ubicación</h2>
        <div class="h-96 m-3 bg-purple-300 rounded-3xl">
            TO-DO - MAPA
        </div>
        <span class="block text-lg px-3 py-0 mx-3"><b>Calle:</b> autocomplete</span>
        <span class="block text-lg px-3 py-0 mx-3"><b>Esquina:</b> autocomplete</span>
        <span class="block text-lg px-3 py-0 mx-3"><b>Número/Apto:</b> autocomplete</span>

        <h2 class="text-xl px-3 py-0 m-3 mt-8 border-l-4 border-blue-500">Cualidades</h2>
        <ul class="grid w-full gap-6 md:grid-cols-3 p-3">
            <li class="flex">
                <input type="checkbox" id="jardin-option" value="" class="hidden peer">
                <label for="jardin-option"
                    class="flex items-center justify-between w-full p-5 text-black bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-white peer-checked:bg-cyan-400 hover:bg-gray-50">
                    <div class="flex-1 text-lg font-semibold">Jardin</div>
                </label>
            </li>
            <li class="flex">
                <input type="checkbox" id="wifi-option" value="" class="hidden peer">
                <label for="wifi-option"
                    class="flex items-center justify-between w-full p-5 text-black bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-white peer-checked:bg-cyan-400 hover:bg-gray-50">
                    <div class="flex-1 text-lg font-semibold">Wifi</div>
                </label>
            </li>
            <li class="flex">
                <input type="checkbox" id="cajaFuerte-option" value="" class="hidden peer">
                <label for="cajaFuerte-option"
                    class="flex items-center justify-between w-full p-5 text-black bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-white peer-checked:bg-cyan-400 hover:bg-gray-50">
                    <div class="flex-1 text-lg font-semibold">Caja fuerte</div>
                </label>
            </li>
            <li class="flex">
                <input type="checkbox" id="admiteMascotas-option" value="" class="hidden peer">
                <label for="admiteMascotas-option"
                    class="flex items-center justify-between w-full p-5 text-black bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-white peer-checked:bg-cyan-400 hover:bg-gray-50">
                    <div class="flex-1 text-lg font-semibold">Admite Mascotas</div>
                </label>
            </li>
        </ul>

        <div class="max-w-sm mx-auto">
            <!-- Checkbox de términos y condiciones -->
            <label for="termsAndConditions" class="flex items-center mb-4">
                <input type="checkbox" name="" id="termsAndConditions" required class="mr-2 h-4 w-4 text-blue-500">
                <span>He leído y acepto los términos y condiciones</span>
            </label>

            <!-- Botón de confirmación -->
            <input type="submit" value="Confirmar"
                class="bg-blue-500 text-white px-4 py-2 rounded-md cursor-pointer hover:bg-blue-600">
        </div>
    </section>
</form>

<script>
    function previewImage(event, previewId) {
        const input = event.target;
        const preview = input.parentElement.querySelector('img');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    const checkInputNumber = ({ evt, input, regex }) => {
        var valor = input.value;
        var regexNumero = regex ?? /^\d+(\.\d{1,2})?$/;

        if (evt.data === '.' && valor.length > 1 && !valor.slice(0, -1).includes('.')) {
            return;
        }

        if (!regexNumero.test(valor)) {
            input.value = valor.slice(0, -1);
        }

        if (valor < 0)
            input.value = 0
    }


</script>
<?php echo $this->endSection() ?>