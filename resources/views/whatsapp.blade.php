 <form id="form" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Nombre
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="name" id="name" type="text" placeholder="Ingresa tu nombre" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Apellidos
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="lastname" id="lastname" type="text" placeholder="Ingresa tus apellidos" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Correo
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="email" id="email" type="email" placeholder="Ingresa tu correo" required>
            </div>
            <div class="flex items-center justify-between">
                <button id="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    <i class="fab fa-whatsapp"></i> Enviar WhatsApp
                </button>
            </div>
        </form>
<script type="text/javascript">
        /* 
* NOTA: se puede mejorar este código
* Su función únicamente es identificar si el dispositivo actual es mobile o no 
*/

function isMobile() {

    if (sessionStorage.desktop)
        return false;
    else if (localStorage.mobile)
        return true;

    var mobile = ['iphone', 'ipad', 'android', 'blackberry', 'nokia', 'opera mini', 'windows mobile', 'windows phone', 'iemobile'];
    for (var i in mobile)
        if (navigator.userAgent.toLowerCase().indexOf(mobile[i].toLowerCase()) > 0) return true;

    return false;
}



const $form = document.querySelector('#form');
const buttonSubmit = document.querySelector('#submit');
const urlDesktop = 'https://web.whatsapp.com/';
const urlMobile = 'whatsapp://';
const phone = '34636902219';
alert(phone);
$form.addEventListener('submit', (event) => {
    event.preventDefault()
    buttonSubmit.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i>'
    buttonSubmit.disabled = true
    setTimeout(() => {
        let name = document.querySelector('#name').value
        let lastname = document.querySelector('#lastname').value
        let contactoEmergencia = document.querySelector('#email').value
        let message = 'send?phone=' + phone + '&text=Buenas, %0A' + contactoEmergencia + '%0A%0A Eres mi contacto de emergencia en caso de ansiedad.%0A Soy %0A' + name + '%0A'  + lastname + '%0A¿Me puedes llamar?%0A' 
        if (isMobile()) {
            window.open(urlMobile + message, '_blank')
        } else {
            window.open(urlDesktop + message, '_blank')
        }
        buttonSubmit.innerHTML = '<i class="fab fa-whatsapp"></i> Enviar WhatsApp'
        buttonSubmit.disabled = false
    }, 4000);
});

</script>